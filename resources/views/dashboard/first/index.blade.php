@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active"><a >First section</a></li>
                    </ol>
                </div>
                <h4 class="page-title">First section</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">First section</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <form action="{{ route('first_section.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image"  class="form-control image logo" >
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <img src="{{('https://aas-bucket.s3.amazonaws.com/uploads/'.@$first->image)}}"  style="width: 100px" class="img-thumbnail image-preview" data-preview="image" alt="">
                        </div>
                     
                       
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{@$first->title}}"  required >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-12">
                                    <textarea id="elm1" name="dec">{{@$first->dec}}</textarea>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Text Button</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="text_button" value="{{@$first->text_button}}"   >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Link Button</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="button" value="{{@$first->button}}" >
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