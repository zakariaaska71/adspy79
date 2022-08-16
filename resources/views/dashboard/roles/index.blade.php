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
                        <li class="breadcrumb-item active" >Roles</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
       

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title"> Roles</h4>
                    

                    <div class="table-responsive">
                        @include('dashboard.parts.alert.success')
                        @include('dashboard.parts.alert.error')
                        <table   class="table table-bordered mb-0 table-centered">
                          
                            <thead>
                                
                            <tr >
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th width="280px">Action</th>

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($roles as $key => $role)
                                <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                {{-- @can('role-edit') --}}
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->_id) }}">Edit</a>
                                {{-- @endcan --}}
                                {{-- @can('role-delete') --}}
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                {{-- @endcan --}}
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

