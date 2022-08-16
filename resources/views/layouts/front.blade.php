<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/fonts/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/WOW-master/css/libs/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/styleBlog.css') }}">

</head>

<body>
        @include('frontend.nav')
@yield('content')

        <div class="copyRights">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="text-uppercase">copyRights 2021 &copy; all rights reseved </p>
                    </div>

                    <div class="col">
                        <ul class="list-unstyled">
                            <li><i class="fab fa-facebook-f "></i></li>
                            <li><i class="fab fa-twitter"></i></li>
                            <li><i class="fab fa-youtube"></i></li>
                            <li><i class="fab fa-instagram"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


</div>

<script src="{{ asset('front/js/jQuery 3.5.1.js.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="{{ asset('front/js/coustm.js') }}"> </script>

    <script src="{{ asset('front/fonts/fontawesome-pro-5.14.0-web/js/all.min.js') }}"></script>

    <script src="{{ asset('front/fonts/jquery.nicescroll-3.7.6/jquery.nicescroll.js') }}"></script>

    <script src="{{ asset('front/fonts/WOW-master/dist/wow.min.js') }}"></script>
    <script>
    </script>
</body>

</html>