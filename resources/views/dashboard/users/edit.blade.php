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
                        <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Edit post</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit User</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Edit Post</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <form action="{{ route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="row">
                        
                        
                       
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">User Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}"  required >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">User Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email" value="{{ $user->email }}"   required >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password"  >
                                </div>
                            </div>                    
                        </div>
                        

                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Country</label>
                                <div class="col-sm-10">
                                    <select name="country" id="country" class="form-control mb-1">
                                        <option value="">Select Country</option>
                                        @foreach ($countrys as $country)
                                            <option value="{{ $country }}" @if($user->country == $country) selected @endif>{{ $country }}</option>
                                        @endforeach
                                    </select>                                  </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Roles</label>
                                <div class="col-sm-10">
                                  
                                    {!! Form::select('roles', $roles,$userRole, array('class' => 'form-control')) !!}
                                </div>
                            </div>                    
                        </div>
                    </div>
                    
           

                        
    
                    <button class="btn btn-gradient-primary" type="submit">Submit form</button>
                </form>

                                                                                      
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>


@endsection