
   @extends('layouts.backend')
   @section('content')
       


        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Metrica</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Analytics</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
       <!--end row-->
        <!--end row--> 
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-8">
                                    <p class="text-dark font-weight-semibold font-14">User</p>
                                    <h3 class="my-3">{{ App\User::count() }}</h3>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="report-main-icon bg-light-alt">
                                        <i data-feather="users" class="align-self-center icon-dual-pink icon-lg"></i>  
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body--> 
                    </div><!--end card--> 
                </div> <!--end col--> 
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">                                                
                                <div class="col-8">
                                    <p class="text-dark font-weight-semibold font-14">Posts</p>
                                    <h3 class="my-3">{{ App\Post::query()->with('related')->has('related')->with('resorese')->has('resorese')->orderBy('created_at', 'desc')->count() }}</h3>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="report-main-icon bg-light-alt">
                                        <i data-feather="pie-chart" class="align-self-center icon-dual-secondary icon-lg"></i>  
                                    </div>
                                </div> 
                            </div>
                        </div><!--end card-body--> 
                    </div><!--end card--> 
                </div> <!--end col--> 
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">                                                
                                <div class="col-8">
                                    <p class="text-dark font-weight-semibold font-14">Products</p>
                                    <h3 class="my-3">{{ App\Productnew::count() }}</h3>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="report-main-icon bg-light-alt">
                                        <i data-feather="briefcase" class="align-self-center icon-dual-purple icon-lg"></i>  
                                    </div>
                                </div> 
                            </div>
                        </div><!--end card-body--> 
                    </div><!--end card--> 
                </div> <!--end col--> 
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-8">
                                    <p class="text-dark font-weight-semibold font-14">Visitor</p>
                                    <h3 class="my-3">85000</h3>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="report-main-icon bg-light-alt">
                                        <i data-feather="users" class="align-self-center icon-dual-warning icon-lg"></i>  
                                    </div>
                                </div> 
                            </div>
                        </div><!--end card-body--> 
                    </div><!--end card--> 
                </div> <!--end col-->                               
            </div><!--end row-->

         <!--end row--> 

        </div><!-- container -->


     
        @endsection