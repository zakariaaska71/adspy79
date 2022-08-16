<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet"
        href="{{ asset('new_style/icons/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0/fontawesome-pro-5.14.0-web/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('new_style/css/style.css') }}">

    <link rel="stylesheet"
        href="{{ asset('new_style/jquery-nice-select-1.1.0/jquery-nice-select-1.1.0/css/nice-select.css') }}">

    <link rel="stylesheet" href="{{ asset('new_style/css/styleProfile.css') }}">
    <title>profile</title>
    
</head>


<body>



    @include('front.nav')


    <div class="container">

        <div class="profileContent account rounded">
            <div class="container">



                <form action="{{ route('user.uppdate_profile') }}" method="post" enctype="multipart/form-data">
                    @if (Session::has('error'))
                        <div class="row mr-20 ml-20">
                            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                                style="background: red;color: white" id="type-error">{{ Session::get('error') }}
                            </button>
                        </div>
                    @endif
                    @if (Session::has('sucess'))
                        <div class="row mr-20 ml-20">
                            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                style="background: green;color: white" id="type-error">{{ Session::get('sucess') }}
                            </button>
                        </div>
                    @endif
                    @csrf
                    <h3>my account</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <img src="{{ asset('new_style/images/user.png') }}">
                            <span class="d-block font-weight-bold">Change Picture</span><input type="file"
                                name="image"></input>
                        </div>

                        <div class="col-lg-4 col-md-4 data">
                            <span class="font-weight-bold">Name</span>
                            <p class="">{{ $user->name }}</p>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control d-none">


                            <span class="font-weight-bold ">Email</span>
                            <p class="">{{ $user->email }}</p>
                            <input type="email" name="email" value="{{ $user->email }}"
                                class="form-control d-none mail"></input>


                        </div>

                        <div class="col-lg-4 col-md-4">
                            <span class="font-weight-bold joined">joined date</span>
                            <span class="d-block date">{{ $user->created_at }}</span>
                            <span class="font-weight-bold">new Password</span>
                            <input type="password" name="password" class="form-control d-none">
                            <span class="d-block">Confirm password</span>
                            <input type="password" name="password_confirmation" class="form-control d-none">

                        </div>

                    </div>

                    <a style="color: white;"
                        class="btn btn-info rounded-pill text-capitalize ml-2 btn-update">update</a>
                    <button class="btn btn-info rounded-pill text-capitalize ml-2 btn-ok" type="submit">OK</button>

                </form>
            </div>
        </div>

        {{-- <div class="profileContent plan rounded">
        <div class="container">
            <h3>plan</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <span class="font-weight-bold d-block">Your Current Plan</span>
                    <span class="d-block mb-2">free</span>
                    <a href="#" class="btn btn-info rounded-pill text-capitalize upgread" data-toggle="modal" data-target="#exampleModal">upgrade</a>

                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="">Subscription Details</h4>
                    <span class="font-weight-bold d-block">Service period</span>
                    <span>Upcoming payments</span>
                    <span class="font-weight-bold d-block">State</span>
                    <span class="d-block">Not subscribed</span>
                </div>


                

            </div>

        </div>
    </div> --}}



        <div class="pricingTable" id="pricing">
            <div class="container">
                <div class="row">
                    {{-- @foreach ($plans as $item)
                        <div class="price-card col-sm-12 col-md-6 col-lg-3 text-center wow animate__flipInY"
                            data-wow-offset="400">

                            <h3>{{ $item->product->name }}</h3>
                            <p><sup>$</sup> {{ $item->amount / 100 }}<span>per {{ $item->interval }}</span></p>
                            <ul class="list-unstyled fa-ul">
                                <li> <span class="fa-li"><i
                                            class="fal fa-check-circle"></i></span>{{ $item->product->description }}
                                </li>



                            </ul>
                            @if ($item->trial_period_days != null)
                                
                                <button class="btn btn-info rounded-pill text-capitalize upgread" data-toggle="modal" data-target="#staticBackdrop4">get started trial for {{ $item->trial_period_days }}
                                    days </button>
                            @else
                                <button class="btn btn-info rounded-pill text-capitalize upgread" data-toggle="modal" data-target="#staticBackdrop4">get started Now </button>
                            @endif

                            
                        </div>
                    @endforeach --}}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                        @endforeach
                    </div>
                    @endif
                        <div class="form-group">
                              
                                @foreach($plans as $plan)

                                <form action="/create-checkout-session" method="POST">
                                    @csrf

                                <div class="card subscription-option " style="width: 18rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <input type="hidden" id="plan-silver" name="plan" value='{{$plan->id}}'>
                       

                                    <div class="card-body">
                                      <h5 class="card-title">{{$plan->product->name}}  {{$plan->currency}}{{$plan->amount/100}}<small> /{{$plan->interval}}   </h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <button type="submit">Checkout</button>
                                    </div>
                                  </div>
                                </form>
                                {{-- <div class="col-md-4">
                                    <div class="subscription-option">
                                        <input type="radio" id="plan-silver" name="plan" value='{{$plan->id}}'>
                                        <input type="hidden"  name="plan_name" value='{{$plan->product->name}}'>
                    
                                        <input type="hidden"  name="trialdaye" value='{{$plan->trial_period_days }}'>
                    
                                        <label for="plan-silver">
                                            <span class="plan-price">{{$plan->currency}}{{$plan->amount/100}}<small> /{{$plan->interval}}</small></span>
                                            <span class="plan-name">{{$plan->product->name}}</span>
                                        </label>
                                    </div>
                                </div> --}}
                                @endforeach
                        </div>
                


                </div>
            </div>
        </div>



    </div>




    <div class="footer">
        <div class="container">
            <p>Copyright companyName 2021 &copy; all rights received</p>
        </div>
    </div>



    <script src="{{ asset('new_style/js/jquery.min.js') }}"></script>
    <script src="{{ asset('new_style/js/popper.js') }}"></script>
    <script src="{{ asset('new_style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('new_style/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('new_style/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('new_style/jquery-nice-select-1.1.0/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"
        integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('new_style/js/prof.js') }}"></script>
\

</html>
