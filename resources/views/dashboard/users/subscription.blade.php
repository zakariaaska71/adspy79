@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item " ><a href="/admin/users">Home</a>Users</li>
                        <li class="breadcrumb-item active" >Subscripe</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
       

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title"> Users</h4>
                    

                    <div class="table-responsive">
                        @include('dashboard.parts.alert.success')
                        @include('dashboard.parts.alert.error')
                        <table   class="table table-bordered mb-0 table-centered">
                          
                            <thead>
                                
                            <tr >
                                <th>user name</th>
                                <th>user email</th>
                                <th>Strip id</th>
                                <th>Plan name</th>
                                <th>Price</th>
                                <th>Status </th>
                                <th>Created at</th>
                             

                                <th>End at</th>
                                <th>Action</th>

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($subs as $key => $item)
                                <tr>
                                <td>{{ @App\User::find($item->user_id)->name }}</td>
                                <td>{{ @App\User::find($item->user_id)->email }}</td>
                                <td>{{ $item->stripe_id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->stripe_plan }}</td>
                                <td>{{ $item->stripe_status }}</td>
                                <td>{{ $item->created_at }}</td>
                              
                                <td>{{ $item->ends_at }}</td>
                                
                                <td> 
                                    @if($item->stripe_status == 'canceled')
                                    <a  dis class="btn btn-primary" href="javascript:void(0)">Canceled</a> 
                                  @else
                                  <a class="btn btn-warning"  href="{{ route('cancel',[$item->user_id,$item->stripe_id ]) }}">Cancel</a>
                                    @endif
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
        let productid = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('product.update.status') }}',
            data: {'status': status, 'productid': productid},
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
