<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Metrica - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- jvectormap -->
        <link href="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('plugins/noty/noty.css') }}">
        <script src="{{ asset('plugins/noty/noty.min.js') }}"></script>
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                @yield('css')

    
    </head>

    <body>
        <!-- leftbar-tab-menu -->
       @include('dashboard.parts.aside')
        <!-- end leftbar-tab-menu-->

        <!-- Top Bar Start -->
        @include('dashboard.parts.nav')
        <!-- Top Bar End -->
        <div class="page-wrapper">

        <div class="page-content-tab">

        @yield('content')
    

        </div>
    </div>

        


        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/metismenu.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
        
        <script src="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
        
        {{-- <script src="{{asset('assets/pages/jquery.analytics_dashboard.init.js')}}"></script> --}}
        <script src="{{asset('plugins/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('assets/pages/jquery.form-editor.init.js')}}"></script>

<!-- Buttons examples -->

<script src="{{ asset('assets/pages-material/jquery.datatable.init.js') }}"></script>
 <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

          $( "#textarea" ).each(function( index ) {
        CKEDITOR.replace($( this ).attr("id"),{
            //your configurations
        });
    });
        });
    </script>
           {{--noty--}}
        
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{--  <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>  --}}
    @yield('script')
    <script>
        $(document).ready(function () {
        $(".image").change(function () {

            var img_name=$(this).attr('name');
if (this.files && this.files[0]) {
    var reader = new FileReader();
   reader.onload = function (e) {
        $('.image-preview[data-preview='+img_name+']').attr('src', e.target.result); }
    reader.readAsDataURL(this.files[0]);
 }
});
});
    </script>
        <script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
                let switchery = new Switchery(html,  { size: 'small' });
            });</script>
    </body>

</html>