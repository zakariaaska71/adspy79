<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Metrica - Admin & Dashboard Template</title>
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
        {!! NoCaptcha::renderJs() !!}

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
                                        <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="{{ asset('assets/images/logo-sm.png') }}" height="55" alt="logo" class="auth-logo"></a>
                                    </div><!--end auth-logo-box-->
                                    
                                    <div class="text-center auth-logo-text">
                                        <h4 style="visibility: hidden" class="mt-0 mb-3 mt-5">Free Register for Metrica</h4>
                                    </div> <!--end auth-logo-text-->  
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger" style="background: #f5d6d6;">
                                     <ul style="text-align: center">
                                      @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                      @endforeach
                                     </ul>
                                    </div>
                                    @endif
                                    @guest
                                        
                              
                                    <form class="form-horizontal auth-form my-4" method="post" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>                                                                                                              
                                                <input type="text" class="form-control"  id="username" placeholder="Enter username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                                            </div>                                    
                                        </div><!--end form-group--> 
    
                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i> 
                                                </span>                                                                                                              
                                                <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email">
                                            </div>                                    
                                        </div><!--end form-group-->
            
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i> 
                                                </span>                                                       
                                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password" required autocomplete="new-password">
                                            </div>                               
                                        </div><!--end form-group--> 
    
                                        <div class="form-group">
                                            <label for="conf_password">Confirm Password</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock-open"></i> 
                                                </span>  
                                                <input type="text" hidden class="form-control"  id="conf_password" placeholder="Enter Confirm Password" name="roles" value="writer" required autocomplete="new-password">
                                                     
                                                <input type="password" class="form-control"  id="conf_password" placeholder="Enter Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                            </div>  
                                            
                                            <div class="form-group">
                                                <label for="mo_number">Country</label>                                            
                                                <div class="input-group mb-3"> 
                                                    <span class="auth-form-icon">
                                                        <i class="mdi mdi-city"></i> 
                                                    </span>                                                       
                                                    <select name="country" id="country" class="form-control mb-1">
                                                        <option value="">Select Country</option>
                                                        @foreach (\Monarobase\CountryList\CountryListFacade::getList() as $country)
                                                            <option value="{{ $country }}">{{ $country }}</option>
                                                        @endforeach
                                                    </select>                                                </div>                               
                                            </div><!--end form-group--> 
                                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                                <div class="col-md-6">
                                                    {!! app('captcha')->display() !!}
                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                       

                                        </div><!--end form-group--> 
            
                                     
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button type="submit" class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light">
                                                    {{ __('Register') }}
                                                </button>                                             </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form>
                                    @endguest
                                    
                                    @auth
                                        {{ dd('auth') }}
                                    @endauth
                                    
                                    <!--end form-->
                                </div><!--end /div-->
                                
                                <div class="m-3 text-center text-muted">
                                    <p class="">Already have an account ? <a href="{{ route('login') }}" class="text-primary ml-2">Log in</a></p>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end auth-card-->
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