@extends('layouts.backend')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
@endsection
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active"><a >Extract products </a></li>
                    </ol>
                </div>
                <h4 class="page-title">Extract products</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Extract products</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <div  style="margin-bottom: 25px;">
                <form action="{{ route('aliexpress.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">

                      
                        
                       
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value=""  required >
                                </div>
                            </div>                    
                        </div>
                         <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">Total</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="number" name="total" value="0" required >
                                </div>
                            </div>                    
                        </div>
                       
                         </div>
                     
                      
                               <button class="btn btn-gradient-primary" type="submit">Submit form</button>


                        
    
    
                    </div>
                </form>
                </div>
                                        <table   class="table table-bordered mb-0 table-centered" id="table">
                          
                            <thead>
                                
                            <tr >
                                <th>#</th>

                                <th>product_id</th>
                                

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($products as $key =>$item)
                                    
                                
                                <tr>
                                    <td>{{$key +1}}</td>

                                <td>{{$item->product_id}}</td>
                               
                            </tr>
                            @endforeach
                             
                            </tbody>
                           

                        </table>

                                                                                      
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>


@endsection
@section('script')
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#table').DataTable( {
    searching: true
    } );
} );
</script>
@endsection