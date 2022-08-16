@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active" >Price Section</li>
                    </ol>
                </div>
                <h4 class="page-title">Price Section</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
       

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Price Section</h4>
                    

                    <div class="table-responsive">
                        @include('dashboard.parts.alert.success')
                        @include('dashboard.parts.alert.error')
                        <table   class="table table-bordered mb-0 table-centered">
                          
                            <thead>
                                
                            <tr >
                                <th>#</th>

                                <th>Pakage Name</th>
                                <th>Role Name</th>
                                <th>Price</th>
                                <th>status</th>
                              
                                <th>action</th>

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($prices  as $key =>$item)
                                    
                                
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->role_name}}</td>
                                    <td>{{$item->price}}</td>
                                <td><input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 'yes' ? 'checked' : '' }}>
                                </td>
                                <td>                                               
                                    <a href="{{route('price.edit',$item->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                    <form style="display: inline" action="{{route('price.destroy',$item->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        
                                        <button type="submit" onclick="return confirm(Are you sure?)" class="button delete-confirm" ><i class="fas fa-trash-alt text-danger font-16"></i></button>
                                    </form>
                                   
                                </td>
                            </tr>
                            @endforeach
                             
                            </tbody>
                           

                        </table>
                        {{-- {{ $posts->links() }} --}}

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div> 
</div>
    
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 'yes' : 'no';
        let priceid = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('price.update.status') }}',
            data: {'status': status, 'priceid': priceid},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
    {{-- <script>
        var ENDPOINT = "{{ url('/dashboard') }}";
        var page = 1;
        infinteLoadMore(page);

        $(window).scroll(function () {
            if ($(window).scrollTop() +1 >= $(document).height() - $(window).height()) {
                page++;
                infinteLoadMore(page);
            }
        });

        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "/posts?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function () {
                        $('.auto-load').show();
                    }
                })
                .done(function (response) {
                    if (response.length == 0) {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }

    </script> --}}
@endsection
