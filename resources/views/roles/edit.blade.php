@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 205px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>الصلاحيات</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
              <li class="breadcrumb-item active">الصلاحيات</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 

    <form action="{{ route('roles.update',$role->id) }}" method="post">
        @csrf
        @method('put')
{{--  {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}  --}}
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="form-group">
                        <p>اسم الصلاحية :</p>
                        <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="">
                        {{--  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}  --}}
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#">الصلاحيات</a>
                                <ul>
                                    <li>
                                        @foreach($permission as $value)

                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $value->name }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''   }}  id="">
                                            {{ $value->name }}</label>
                                        <br />
                                        @endforeach
                                    </li>    


                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <input type="submit" class="btn btn-main-primary" value="تحديث" >
                        {{--  <button type="submit" class="btn btn-main-primary">تحديث</button>  --}}
                    </div>
                </form>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
</div>
        

@endsection