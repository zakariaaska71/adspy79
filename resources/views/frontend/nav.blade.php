<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ ('https://aas-bucket.s3.amazonaws.com/uploads/'.general('logo')) }}" width="45" highth="45"  alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(App\Menu::where('show',1)->where('type','header')->orderBy('created_at', 'acs')->get() as $menu)
                
                
                <li class="nav-item ">
                    <a class="nav-link active" href="{{$menu->url}}">{{$menu->title}} </a>
                </li>
                @endforeach
            

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
            <li class="nav-item dropdown d-flex align-items-center">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.html">Profile</a>

                    <a class="dropdown-item" href="{{ route('logout_user') }}">logOut</a>
                </div>
            </li>
        @endguest
        </div>
    </div>
</nav>