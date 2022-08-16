<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="{{ route('index.dashboard') }}" class="logo logo-metrica d-block text-center">
            <span>
                <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo')) }}" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <nav class="nav">
            <a href="#MetricaAnalytics" class="nav-link"  data-placement="right" title="" data-original-title="User" >
                <i data-feather="user" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaAnalytics-->  

            <a href="#MetricaApps" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Roles" >
                <i data-feather="lock" class="align-self-center menu-icon icon-dual"></i>

            </a><!--end MetricaApps-->

            <!--end MetricaUikit-->
            <a href="#postsss" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="posts" data-trigger="hover">
                <i data-feather="pie-chart" class="align-self-center menu-icon icon-dual"></i>
            </a>
            <a href="#MetricaPages" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Pages" data-trigger="hover">
                <i data-feather="copy" class="align-self-center menu-icon icon-dual"></i>             
            </a>
            <a href="#MetricaUikit" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Blogs" data-trigger="hover">
                <i data-feather="package" class="align-self-center menu-icon icon-dual"></i>
            </a>
            <a href="#MetricaAuthentication" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Front End" data-trigger="hover">
                <i data-feather="copy" class="align-self-center menu-icon icon-dual"></i>             
            </a> <!--end MetricaAuthentication--> 
           
            <a href="#settings" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Front End" data-trigger="hover">
                <i data-feather="settings" class="align-self-center menu-icon icon-dual"></i>             
            </a> <!--end MetricaAuthentication--> 

        </nav><!--end nav-->
        <div class="pro-metrica-end">
            <a href="" class="help" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Chat">
                <i data-feather="message-circle" class="align-self-center menu-icon icon-md icon-dual mb-4"></i> 
            </a>
            <a href="" class="profile">
                <img src="{{asset('assets/images/users/user-4.jpg')}}" alt="profile-user" class="rounded-circle thumb-sm"> 
            </a>
        </div>
    </div><!--end main-icon-menu-->

    <div class="main-menu-inner">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route('index.dashboard') }}" class="logo">
                <span>
                    <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo')) }}" alt="logo-large" class="logo-lg logo-dark">
                    <img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo')) }}" alt="logo-large" class="logo-lg logo-light">
                </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-body slimscroll">                    
            <div id="MetricaAnalytics" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Users</h6>       
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.create') }}">Add user</a></li>
                
                </ul>
            </div><!-- end Analytic -->

            <div id="MetricaApps" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Roles</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">All Roles</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('roles.create') }}">New Role</a></li>
                
                </ul>
            </div><!-- end Crypto -->
            
            <div id="MetricaUikit" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Blogs</h6>      
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">All Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.create') }}">New Blog</a></li>
                
                </ul>
            </div><!-- end Others -->

            <div id="MetricaPages" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Pages</h6>        
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('page.index') }}">All Pages</a></li>
               
                </ul>
            </div><!-- end Pages -->
            <div id="MetricaAuthentication" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Front End</h6>     
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('menu.index') }}">Menu section</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('first_section.index') }}">First section</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('video_section.index') }}">Video section</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about_section.index') }}">About section</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ route('section.index') }}">section  one</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('section3.index') }}">section two </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact_section.index') }}">contact section</a></li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="w-100">Product section</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('product.index') }}">Show all</a></li>
                            <li><a href="{{ route('product.create') }}">New Product</a></li>
                          
                        </ul>            
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="w-100">price section</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('price.index') }}">Show all</a></li>
                            <li><a href="{{ route('price.create') }}">New Price</a></li>
                          
                        </ul>            
                    </li>
                   <li class="nav-item">
                        <a class="nav-link" href="#"><span class="w-100">Page section</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('page.index') }}">Show all</a></li>
                            <li><a href="{{ route('page.create') }}">New page</a></li>
                          
                        </ul>            
                    </li>
                    
                    
                    

                </ul>
            </div>
            <div id="postsss" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Posts</h6>     
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">View All</a></li>
                  

                </ul>
            </div>
            
            <div id="settings" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">settings</h6>     
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('general.index') }}">General  Setting</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/social">Soscal section</a></li>
           

                </ul>
            </div><!-- end Authentication-->
        </div><!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>