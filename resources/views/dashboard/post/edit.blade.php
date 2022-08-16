 @extends('layouts.backend')
 @section('content')
 @section('css')
 @endsection
 <div class="container-fluid">
     <!-- Page-Title -->
     <div class="row">
         <div class="col-sm-12">
             <div class="page-title-box">
                 <div class="float-right">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="">Home</a></li>
                         <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                         <li class="breadcrumb-item active">Edit post</li>
                     </ol>
                 </div>
                 <h4 class="page-title">Edit Post</h4>
             </div>
             <!--end page-title-box-->
         </div>
         <!--end col-->
     </div>
     <div class="row">
         <div class="col-lg-10">
             <div class="card">
                 <div class="card-body">
                     <h4 class="mt-0 header-title">Create Post</h4>
                     <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                         @csrf @method('put')
                         <div class="row">
                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input" class="col-sm-2 col-form-label text-right">post
                                         id</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" name="post_id"
                                             value="{{ $post->post_id }}">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input" class="col-sm-2 col-form-label text-right">Page
                                         Name</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" name="page_name"
                                             value="{{ $post->page_name }}">
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input" class="col-sm-2 col-form-label text-right">Page
                                         link</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" value="{{ $post->page_link }}"
                                             name="page_link">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input" class="col-sm-2 col-form-label text-right">Post
                                         link</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" value="{{ $post->post_link }}"
                                             name="ads_link">
                                     </div>
                                 </div>
                             </div>


                             <!--<div class="col-lg-8">-->
                             <!--    <div class="form-group row">-->
                             <!--        <label for="example-text-input" class="col-sm-2 col-form-label text-right">Post Format</label>-->
                             <!--        <div class="col-sm-10">-->
                             <!--            <select name="ad_format" class="form-control" id="">-->
                             <!--                <option value="image" @if ($post->ad_format == 'image') selected @endif>image</option>-->
                             <!--                <option value="video" @if ($post->ad_format == 'video') selected @endif>video</option>-->
                             <!--            </select>-->
                             <!--        </div>-->
                             <!--    </div>                    -->
                             <!--</div>-->
                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input"
                                         class="col-sm-2 col-form-label text-right">Language</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" value="{{ $post->lang }}"
                                             name="lang">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8">
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label text-right">Country</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ json_encode(array_unique($post->country_new)) }}"
                                            name="country_new">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label text-right">Country see In</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ json_encode(array_unique($post->country_seen_new)) }}"
                                            name="country_seen_new">
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input"
                                         class="col-sm-2 col-form-label text-right">Category</label>
                                     <div class="col-sm-10">
                                         @php
                                             $arr = json_decode($post->category);
                                         @endphp
                                         <select class="form-control" name="category[]" multiple>
                                             <option selected disabled value="">Chose Category</option>

                                             <option value="All" @if ($post->category == 'All') selected @endif>All
                                             </option>
                                             <option value="Empty" @if ($post->category == 'Empty') selected @endif>
                                                 Empty</option>
                                             <option value="Bags&Shoes"
                                             @if ( in_array('Bags&Shoes',$arr) || in_array('bags&shoes',$arr) ) selected @endif>Bags&Shoes</option>
                                             <option value="Jewelry&Watches"
                                             @if ( in_array('Jewelry&Watches',$arr) || in_array('jewelry&watches',$arr) ) selected @endif>Jewelry&Watches
                                             </option>
                                             <option value="Vehicles"@if ( in_array('Vehicles',$arr) || in_array('vehicles',$arr) ) selected @endif>
                                                 Vehicles</option>
                                             <option value="Fashion"@if ( in_array('Fashion',$arr) || in_array('fashion',$arr) ) selected @endif>
                                                 Fashion</option>
                                             <option value="Beauty" @if ( in_array('Beauty',$arr) || in_array('beauty',$arr) ) selected @endif>

                                                  Beauty</option>
                                             <option value="Events" @if ( in_array('Events',$arr) || in_array('events',$arr) ) selected @endif>
                                                 Events</option>
                                             <option value="Phone&Electronics"
                                             @if ( in_array('Phone&Electronics',$arr) || in_array('phone&electronics',$arr) )selected @endif>Phone&Electronics
                                             </option>
                                             <option value="Business&Finance"
                                             @if ( in_array('Business&Finance',$arr) || in_array('business&finance',$arr) ) selected @endif>Business&Finance
                                             </option>
                                             <option value="Home&Garden"
                                             
                                                  @if ( in_array('Home&Garden',$arr) || in_array('home&garden',$arr) ) selected @endif>Home&Garden
                                             </option>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input"
                                         class="col-sm-2 col-form-label text-right">Gender</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" value="{{ $post->gender }}"
                                             name="gender">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8" style="margin-top: 10px">
                                 <div class="form-group row">
                                     <label for="example-text-input"
                                         class="col-sm-2 col-form-label text-right">Interested</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" value="{{ $post->interested }}"
                                             name="interested">
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input"
                                         class="col-sm-2 col-form-label text-right">Age</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" name="age"
                                             value="{{ $post->age }}">
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input"
                                         class="col-sm-2 col-form-label text-right">objective</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" value="{{ $post->button }}"
                                             name="button">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title
                                         Post</label>
                                     <div class="col-sm-10">
                                         <textarea class="elm1" name="title">{{ $post->title }}</textarea>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-8">
                                 <div class="form-group row">
                                     <label for="example-text-input"
                                         class="col-sm-2 col-form-label text-right">Description Post</label>
                                     <div class="col-sm-10">
                                         <textarea class="elm1" name="Ad_Description">{{ $post->Ad_Description }}</textarea>
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
 @section('script')
     <script src="{{ asset('plugins/moment/moment.js ') }} "></script>
     <script src="{{ asset('plugins/daterangepicker/daterangepicker.js ') }} "></script>
     <script src="{{ asset('plugins/select2/select2.min.js ') }} "></script>
     <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js ') }} "></script>
     <script src="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.js ') }} "></script>
     <script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js ') }} "></script>
     <script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js ') }} "></script>
     <script src="{{ asset('assets/pages/jquery.forms-advanced.js') }}"></script>
     <script src="{{ asset('plugins/moment/moment.js') }}"></script>
     <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
     <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
     <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
     <script src="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
     <script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
     <script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

     <script>
         $('.select2-multi').select2();
     </script>
 @endsection
