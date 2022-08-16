@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active"><a >General</a></li>
                    </ol>
                </div>
                <h4 class="page-title">General</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">General</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <form action="{{ route('general.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="logo"  class="form-control image logo" >
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <img src="{{('https://aas-bucket.s3.amazonaws.com/uploads/'.@@$general->logo)}}"  style="width: 100px" class="img-thumbnail image-preview" data-preview="logo" alt="">
                        </div>
                         <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Icon</label>
                                <div class="col-sm-10">
                                    <input class="form-control image " type="file" name="icon"   >
                                </div>
                            </div>
                         
                                               
                        </div>
                        <div class="form-group">
                            <img src="{{('https://aas-bucket.s3.amazonaws.com/uploads/'.@$general->icon)}}"  style="width: 100px" class="img-thumbnail image-preview" data-preview="icon" alt="">
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{@$general->title}}"  required >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="dec">{{@$general->dec}}</textarea>
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