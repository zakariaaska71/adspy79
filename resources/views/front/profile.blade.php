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
    <style>
        .radio-toolbar {
            margin: 10px;
        }

        .radio-toolbar input[type="radio"] {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .radio-toolbar label {
            display: inline-block;
            background-color: #ddd;
            padding: 10px 20px;
            font-family: sans-serif, Arial;
            font-size: 16px;
            border: 2px solid #444;
            border-radius: 4px;
        }

        .radio-toolbar label:hover {
            background-color: #dfd;
        }

        .radio-toolbar input[type="radio"]:focus+label {
            border: 2px dashed #444;
        }

        .radio-toolbar input[type="radio"]:checked+label {
            background-color: #bfb;
            border-color: #4c4;
        }

    </style>



    @include('front.nav')


    <div class="container">

        <div class="profileContent account rounded">
       



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



    <div class="profileContent account rounded">
        <div class="container">
            <h3>Plans</h3>

                <div class="row">

                    @foreach ($plans as $plan)
                        <div class="price-card col-sm-12 col-md-6 col-lg-3 text-center wow animate__flipInY" style="text-align: center !important;
                        background-color: #efefef;
                        padding: 20px;     margin: 20px;"
                            data-wow-offset="400">
                            <input type="hidden" name="plan_name" value='{{ $plan->name }}'>
                            <h3>{{ $plan->name }} </h3>
                            <p><sup>$</sup> {{ $plan->price }}<span>per {{ $plan->duration }}</span>
                            </p>
                            <ul class="list-unstyled fa-ul">
                                <li> <span class="fa-li"><i
                                            class="fal fa-check-circle"></i></span>{!! $plan->dec !!}
                                </li>

                            </ul>
                           @if(auth()->user()->subscriptions()->where('name', $plan->name )->active()->first())
                            <form action="calncel_plan" method="post">
                                
                                @csrf
                                <input type="hidden" name="stripe_id" value="{{ $user->subscriptions()->where('name',$plan->name)->first()->stripe_id }}">

                                <button class="btn btn-warning delete-confirm" type="submit">Cancel</button>
                            </form>
                            @else
                            <form action="paymet_page" method="get">
                            
                                <input type="hidden" name="plan" value="{{ $plan->paln_id }}">
                                <button class="btn btn-info" type="submit">Subscripe</button>
                            </form>
                            @endif



                        </div>
                    @endforeach

                    <div id="show_form" style="display: none;    width: 42%;
                            margin: auto;
                          border-style: ridge;">
                        <input id="card-holder-name" type="text" style="    margin-left: 20px;"><label
                            for="card-holder-name">Card Holder Name</label>
                        @csrf
                        <div class="form-row">
                            <label for="card-element" style="margin-left: 20px">Credit or debit card</label>
                            <div id="card-element" style="width: 90%;margin: auto" class="form-control">
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="stripe-errors"></div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group text-center">
                            <button type="button" style="    width: 50%;
                        margin: auto;
                        margin-top: 20px;" id="card-button" data-secret="{{ $intent->client_secret }}"
                                class="btn btn-lg btn-success btn-block">SUBMIT</button>
                        </div>
                    </div>
                    </form>




                </div>
            </div>
        </div>
        <div class="modal mod-payment fade" id="staticBackdrop4" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel4" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">
                        <h3 class="text-secondary">Payment Details</h3>
                        <form id="signup-form" action="" method="post">
                            @csrf
                            <div class="flex flex-wrap mb-6 mt-8 px-6">
                                <label for="card-element" class="block text-gray-700 text-sm font-bold mb-2">
                                    Name on Card
                                </label>
                                <input type="text" name="name" id="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="flex flex-wrap mb-6 mt-8 px-6">
                                <label for="card-element" class="block text-gray-700 text-sm font-bold mb-2">
                                    Credit Card Info
                                </label>
                                <!-- Stripe Elements Placeholder -->
                                <div id="card-element"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div id="card-errors" class="text-red-400 text-bold mt-2 text-sm font-medium"></div>
                            </div>

                            <button type="submit" id="card-button"
                                class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 float-right mr-6">
                                Subscribe
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info">ok</button>
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
    <script src="{{ asset('new_style/jquery-nice-select-1.1.0/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are You Sure To Cancel This Plan`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
        $('.redrow-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `هل متأكد من إعادة خدمة الموظف ؟`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
        $('.drow-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `هل متأكد من الغاء خدمة الموظف  ؟`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    </script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"
        integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('new_style/js/prof.js') }}"></script>
  

</html>
