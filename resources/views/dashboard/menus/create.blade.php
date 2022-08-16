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
                        <li class="breadcrumb-item"><a href="{{ route('menu.index')}}">Mneu</a></li>
                        <li class="breadcrumb-item active">Create Menu</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Menu</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Create Menu</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <form action="{{ route('menu.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        
                        
                       
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value=""  required >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="url" value=""  required >
                                </div>
                            </div>                    
                        </div>
                      
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" id="country" class="form-control mb-1">
                                        <option value="">Select Type</option>
                                            <option value="header">Header</option>
                                            <option value="footer">Footer</option>

                                    </select>                                  </div>
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