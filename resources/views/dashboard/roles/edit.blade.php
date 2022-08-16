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
                        <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">Roles</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
                    </ol>
                </div>
                {{-- {{ dd(auth()->user()->getAllPermissions()) }} --}}
                <h4 class="page-title">Edit Role</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Edit Role</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <form action="{{ route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
                    @csrf  @method('put')
                    <div class="row">
                        
                        
                       
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Rols Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $role->name }}"  required >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Permission</label>
                                <div class="col-sm-10">
                                    @foreach($permission as $value)
                                    <input type="checkbox" name="permission[]" value="{{ $value->name }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''   }}  id="">
                                    {{ $value->name }}</label>
                                    <br/>
                                    @endforeach                                </div>
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