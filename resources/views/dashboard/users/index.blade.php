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
                        <li class="breadcrumb-item active" >Users</li>
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
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($users as $key => $user)
                                <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                                @endif
                                </td>
                                <td>
                                {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                <a class="btn btn-primary" href="{{ route('show_subs',$user->id) }}">show subs</a>

                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
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
