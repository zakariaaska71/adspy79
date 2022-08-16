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
                        <li class="breadcrumb-item active" >Price Section</li>
                    </ol>
                </div>
                <h4 class="page-title">Price Section</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
       

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Price Section</h4>
                    

                    <div class="table-responsive">
                        @include('dashboard.parts.alert.success')
                        @include('dashboard.parts.alert.error')
                        <table   class="table table-bordered mb-0 table-centered">
                          
                            <thead>
                                
                            <tr >
                                <th>#</th>

                                <th>Page title</th>
                   
                                <th>status</th>
                              
                                <th>action</th>

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($pages  as $key =>$item)
                                    
                                
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$item->title}}</td>
                               
                                <td><input type="checkbox" data-id="{{ $item->id }}" name="show" class="js-switch" {{ $item->show == '1' ? 'checked' : '' }}>
                                </td>
                                <td>                                               
                                    <a href="{{route('page.edit',$item->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                    <form style="display: inline" action="{{route('page.destroy',$item->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        
                                        <button type="submit" onclick="return confirm(Are you sure?)" class="button delete-confirm" ><i class="fas fa-trash-alt text-danger font-16"></i></button>
                                    </form>
                                   
                                </td>
                            </tr>
                            @endforeach
                             
                            </tbody>
                           

                        </table>

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div> 
</div>
    
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $('.js-switch').change(function () {
        let show = $(this).prop('checked') === true ? '1' : '0';
        let pageid = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('page.update.status') }}',
            data: {'show': show, 'pageid': pageid},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
   
@endsection
