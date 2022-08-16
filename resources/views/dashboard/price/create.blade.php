@extends('layouts.backend')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active"><a>Price Product </a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Price Product</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Price Product</h4>
                        @include('dashboard.parts.alert.success')
                        @include('dashboard.parts.alert.error')
                        <form action="{{ route('price.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">




                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                            class="col-sm-3 col-form-label text-right">Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                            class="col-sm-3 col-form-label text-right">Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" step="0.01" name="price" value=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                            class="col-sm-3 col-form-label text-right">Plan id in stripe</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text"  name="paln_id" value=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-right">Role
                                            Name</label>
                                        <div class="col-sm-9">
                                            <select name="role_name" class="form-control" id="">
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-right">Duration / per Mounth </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" min="1" max="12"  name="duration"  required >
                                        </div>
                                    </div>                    
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                            class="col-sm-3 col-form-label text-right">Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="elm1" name="dec"></textarea>
                                        </div>
                                    </div>
                                </div>






                            </div>
                            <button class="btn btn-gradient-primary" type="submit">Submit form</button>
                        </form>

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
    @endsection
