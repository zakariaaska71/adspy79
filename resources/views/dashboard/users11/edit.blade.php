@extends('layouts.backend')
@section('content')
    
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index')}}">Posts</a></li>
                        <li class="breadcrumb-item active">Create post</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Post</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Create Post</h4>
              
              
                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Counrty:</strong>
                    <select name="country" id="country" class="form-control mb-1">
                        <option value="">Select Country</option>
                        @foreach ($countrys as $country)
                            <option value="{{ $country }} " @if($user->country == $country) selected @endif>{{ $country }}</option>
                        @endforeach
                    </select>                       </div>
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles', $roles,$userRole, array('class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
                {!! Form::close() !!}
                                                                                      
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>


@endsection