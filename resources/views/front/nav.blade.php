

  <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo')) }}" width="150" height="100" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mr-auto">

                <li class="nav-item ">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if(Route::is('post_index')) active @endif"   href="{{ route('post_index') }}">posts</a>
                </li>
               
                 <li class="nav-item">
                    <a class="nav-link @if(Route::is('productgs_index')) active @endif"   href="{{ route('productgs_index') }}">products</a>
                </li>
              
                 <li class="nav-item">
                    <a class="nav-link @if(Route::is('featured_post')) active @endif" href="{{ route('featured_post') }}">featured posts</a>
                </li>
               
               

               



            </ul>
            @guest


                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary login" href="{{ route('login') }}">log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary signup" href="{{ route('register') }}">sign up</a>
                    </li>
                </ul>

            @else
                <li class="nav-item dropdown d-flex ">
                    <img src="{{asset('new_style/images/user.png')}}" class="" style="width: 30px;height: 30px; background-color: #d8d8d8; border-radius: 50%;;">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fad fa-user "></i>Profile</a>
                        @auth
                        @if(Route::is('post_index') || Route::is('home') )
                        <a class="dropdown-item" href="/likes"><i class="fas fa-thumbs-up"></i>Likes Post</a>
                        @endif
                        @endauth
                        <a class="dropdown-item" href="{{ route('logout_user') }}"><i class="fad fa-sign-out-alt"></i>logOut</a>
                    </div>
                </li>
            @endguest
            </div>
        </div>
    </nav>