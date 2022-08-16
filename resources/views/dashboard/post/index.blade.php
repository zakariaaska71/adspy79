@extends('layouts.backend')
@section('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    

@endsection
@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active" >Posts</li>
                    </ol>
                </div>
                <h4 class="page-title">Basic Tables</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
       

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">All Post</h4>
                    <form method="get" action="{{route('posts.index')}}">
                        <div class="row">
                          
                        <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-5 col-form-label text-right">Post Id</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="post_id" value="{{$request->post_id}}"   >
                                </div>
                            </div>                    
                        </div>  
                        
                        <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-5 col-form-label text-right">Page name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="page_name" value="{{$request->page_name}}"   >
                                </div>
                            </div>                    
                        </div> 
                         <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-5 col-form-label text-right">Post create</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="post_create" value="{{$request->post_create}}"   >
                                </div>
                            </div>                    
                        </div> 
                           <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-5 col-form-label text-right">Last seen </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="last_seen" value="{{$request->last_seen}}"   >
                                </div>
                            </div>                    
                        </div> 
                           <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-5 col-form-label text-right">Empty age</label>
                                <div class="col-sm-10">
                                    <select class="form-control"  name="age"    >
                                        <option selected disabled value="">chose empty age</option>
                                  
                                        <option value="empty" @if($request->age =='empty' ) selected @endif >empty</option>
                                        <option value="empty" @if($request->age =='notempty' ) selected @endif >notempty</option>

    </select>
                                </div>
                            </div>                    
                            </div>                    

                         <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-5 col-form-label text-right">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-control"  name="gender"    >
                                        <option selected disabled value="">chose gender</option>
                                        <option value="All" @if($request->gender =='All' ) selected @endif>All</option>
                                        <option value="Males" @if($request->gender =='Males' ) selected @endif>Males</option>
                                        <option value="Females" @if($request->gender =='Females' ) selected @endif>Females</option>
                                        <option value="empty" @if($request->gender =='empty' ) selected @endif>empty</option>
                                            </select>

                                </div>
                            </div>                    
                        </div>
                         <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-sm-5 col-form-label text-right">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control"  name="category"    >
                                            <option selected disabled value="">Chose Category</option>

                                             <option value="All" @if($request->category =='All' ) selected @endif>All</option>
                                             <option value="Empty" @if($request->category =='Empty' ) selected @endif>Empty</option>
                                            <option value="Bags&Shoes" @if($request->category =='Bags&Shoes' ) selected @endif>Bags&Shoes</option>
                                            <option value="Jewelry&Watches" @if($request->category =='Jewelry&Watches' ) selected @endif>Jewelry&Watches</option>
                                            <option value="Vehicles" @if($request->category =='Vehicles' ) selected @endif>Vehicles</option>
                                            <option value="Fashion" @if($request->category =='Fashion' ) selected @endif>Fashion</option>
                                            <option value="Beauty" @if($request->category =='Beauty' ) selected @endif>Beauty</option>
                                            <option value="Events" @if($request->category =='Events' ) selected @endif>Events</option>
                                            <option value="Phone&Electronics" @if($request->category =='Phone&Electronics' ) selected @endif>Phone&Electronics </option>
                                            <option value="Business&Finance" @if($request->category =='Business&Finance' ) selected @endif>Business&Finance</option>
                                            <option value="Home&Garden" @if($request->category =='Home&Garden' ) selected @endif>Home&Garden</option>
                                        </select>

                                </div>
                            </div>                    
                        </div>
                        
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group ">
                                    <label for="example-text-input" class="col-sm-5 col-form-label text-right">Country</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="country" value="{{$request->country}}"   >
                                    </div>
                                </div>                    
                            </div> 
                               <div class="col-lg-3">
                                <div class="form-group ">
                                    <label for="example-text-input" class="col-sm-5 col-form-label text-right">country seen </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="country_seen_in" value="{{$request->country_seen_in}}"   >
                                    </div>
                                </div>                    
                            </div>
                        </div>
                         <div class="col-lg-3">
                            <div class="form-group ">
                                <div class="col-sm-10">
                                    <input class=" btn btn-primary" type="submit"  value="search"   >
                                </div>
                            </div>                    
                        </div>
                        </form>
                    

                    <div class="table-responsive">
                        @include('dashboard.parts.alert.success')
                        @include('dashboard.parts.alert.error')
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          
                            <thead>
                                
                            <tr >
                                        <td><input type="checkbox" id="check_all"></td>

                                <th>#</th>
                               
                                <th>logo</th>
                                 <th>Category</th>
                                <th style="width: 200px">title</th>
                                <th>image/video</th>
                                <th>Special</th>

                                <th>action</th>

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($posts  as $key =>$item)
                                    
                                
                                <tr>
                                                <td><input type="checkbox" class="checkbox" data-id="{{$item->id}}"></td>

                                    <td>{{$key +1}}</td>
                                    <td><img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.@$item->resorese->image) }}" width="100" height="80" alt=""></td>
                                     <td><select name="cars"  readonly="true" ondblclick="this.readOnly='';" onchange="change_cat('{{$item->_id}}')" id="{{$item->id}}" class="form-control" multiple>
                                            <option value="Bags&Shoes" @if(in_array('Bags&Shoes',json_decode($item->category)) || in_array('bags&shoes',json_decode($item->category))) selected @endif >Bags&Shoes</option>
                                            <option value="Jewelry&Watches" @if(in_array('Jewelry&Watches',json_decode($item->category)) || in_array('jewelry&watches',json_decode($item->category))) selected @endif>Jewelry&Watches</option>
                                            <option value="Vehicles" @if(in_array('Vehicles',json_decode($item->category)) || in_array('vehicles',json_decode($item->category))) selected @endif>Vehicles</option>
                                            <option value="Fashion" @if(in_array('Fashion',json_decode($item->category)) || in_array('fashion',json_decode($item->category))) selected @endif>Fashion</option>
                                            <option value="beauty" @if(in_array('beauty',json_decode($item->category)) || in_array('Beauty',json_decode($item->category))) selected @endif>Beauty</option>
                                            <option value="Events" @if(in_array('Events',json_decode($item->category)) || in_array('events',json_decode($item->category))) selected @endif>Events</option>
                                            <option value="Phone&Electronics " @if(in_array('Phone&Electronics s',json_decode($item->category)) || in_array('phone&electronics s',json_decode($item->category))) selected @endif>Phone&Electronics </option>
                                            <option value="Business&Finance" @if(in_array('Business&Finance',json_decode($item->category)) || in_array('business&finance',json_decode($item->category)) ) selected @endif>Business&Finance</option>
                                            <option value="Home&Garden" @if(in_array('Home&Garden',json_decode($item->category)) || in_array('home&garden',json_decode($item->category)) ) selected @endif>Home&Garden</option>
                                        </select></td>
                                        
                                              @php
                            $data = str_replace( "</p>", "", Str::limit($item->title ? $item->title : 'Post title', 35) );
                            $data = str_replace( "<p>", "", Str::limit($item->title ? $item->title : 'Post title', 35) );
                        @endphp
                                    <td>{!! $data !!}</td>
                                    <td>{{@$item->ad_format}}</td>

                                <td><input type="checkbox" data-id="{{ @$item->id }}" name="special" class="js-switch" {{ @$item->special == '1' ? 'checked' : '' }}>
                                </td>
                                <td>      
                                    {{-- <a class="btn btn-primary" href="{{ route('posts.edit',@$item->_id) }}">Edit</a> --}}

                                    <a class="btn btn-primary" href="{{ route('posts.edit',@$item->_id) }}">Edit</a>
                                    {{-- @endcan --}}
                                    {{-- @can('role-delete') --}}
                                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', @$item->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                   
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                                                                        <td colspan="3"><button class="btn btn-danger delete-all">Delete All</button> </td>

    </tr>
                             
                            </tbody>

   

                        </table>

 {{$posts->appends(Request::all())->links()}}
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div> 
</div>
    
@endsection
@section('script')
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript">
$(document).ready(function() {


} );
function  change_cat(id){
    var t = $('#'+id).val();
    
             $.ajax({
                        url: "{{ route('change_category') }}",
                        type: 'get',
                          data: {'id': id, 'value': t},
                        success: function (data) {
                            if (data['status']==true) {
                           alert('change succeffluy');
                        }
                    
                    }
        });
}
    $(document).ready(function () {
        
      
        
        $('#check_all').on('click', function(e) {
            if($(this).is(':checked',true))
            {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked',false);
            }
        });
//إختيار الجميع
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
        });
//إختيار عنصر معين
        $('.delete-all').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if(idsArr.length <=0)
            {
//عند الضغط على زر الحذف - التحقق اذا كان المستخدم قد اختار اي صف للحذف
                alert("Please select atleast one record to delete.");
            }  else {
//رسالة تأكيد للحذف
                if(confirm("Are you sure, you want to delete the selected categories?")){
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('delete-multiple-post') }}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();//حذف الصف بعد اتمام الحذف من قاعدة البيانات
                                });
//رسالة toast للحذف
                                toastr.options.closeButton = true;
                                toastr.options.closeMethod = 'fadeOut';
                                toastr.options.closeDuration = 100;
                                toastr.success('Deleted Successfully');
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
    $('.js-switch').change(function () {
        let special = $(this).prop('checked') === true ? 1 : 0;
        let post_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('post.update.special') }}',
            data: {'special': special, 'post_id': post_id},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
@endsection