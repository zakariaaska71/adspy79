<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Resset - Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        
        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app-material.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="auth-page">
                        <div class="card auth-card shadow-lg">
                            <div class="card-body">
                                <div class="px-3">
                                    <div class="auth-logo-box">
                                        <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="{{asset('assets/images/logo-sm.png')}}" height="55" alt="logo" class="auth-logo"></a>
                                    </div><!--end auth-logo-box-->
                                    
                                    @include('dashboard.parts.alert.success')
                                    @include('dashboard.parts.alert.error')
                                    
                                    <form class="form-horizontal" method="post" action="{{ route('reset.password.post') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group">
                                            <label for="username">{{ __('Password') }}</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>                                                                                                              
                                                <input type="password" class="form-control" id="username" name="password" required  placeholder="Enter Password">
                                            </div>                                    
                                        </div><!--end form-group--> 
            
                                        <div class="form-group">
                                            <label for="usernamew">{{ __('Confirm Password') }}</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>                                                                                                              
                                                <input type="password" class="form-control" id="usernamew" name="password_confirmation" required  placeholder="Enter Password">
                                            </div>                                    
                                        </div>    
                                      
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button type="submit" class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light">
                                                    {{ __('Send') }}
                                                </button>                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                </div><!--end /div-->
                                
                              
                            </div><!--end card-body-->
                        </div><!--end card-->
               
                    </div><!--end auth-page-->
                </div><!--end col-->           
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        


        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/metismenu.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('plugins/apexcharts/apexcharts.min.js')}}"></script>        

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        
    </body>

</html>