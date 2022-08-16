@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" >Posts</li>
                    </ol>
                </div>
                <h4 class="page-title">Users</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
       

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">All User</h4>
                    

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key=>$user)
                                    
                            
                            <tr>
                                <td>#{{ $key +1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                                @endif

                                <td>
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div> 
</div>
    
@endsection