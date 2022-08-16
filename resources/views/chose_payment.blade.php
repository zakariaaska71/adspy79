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
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

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
                           
                                        
                              
                                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <div style="width:100%;">
                        <div style="float: left; width: 50%"> 
                            <form style="display: inline" class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                                {{ csrf_field() }}
                                <input type="text" value="611b93134e530000ba00614e" name="price_id" hidden>
                                
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button   id="paypal_submit">
                                            <img src="https://storage.googleapis.com/rqiim-storage/6031895dfc5124001c84a04d.182325f88f740d61c9ed67c9.png" width="100" height="50" alt="">
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="float: right; width: 50%"> 
                                
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button  id="stripe_submit">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Visa_2021.svg/1200px-Visa_2021.svg.png" width="100" height="50" alt="">
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="container" id="stripe_form"  style="display: none">
                        <div class="row">
                        <!-- You can make it whatever width you want. I'm making it full width
                        on <= small devices and 4/12 page width on >= medium devices -->
                        <div class="col-xs-12 col-md-12">
                        
                        
                        <!-- CREDIT CARD FORM STARTS HERE -->
                        <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                        <img class="img-responsive pull-right" src="https://logos-world.net/wp-content/uploads/2020/04/Visa-Logo-1976-1992.png" width="5" height="30">
                        <img class="img-responsive pull-right" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MasterCard_logo.png/640px-MasterCard_logo.png" width="5" height="30">


                        </div>
                        </div>                    
                        </div>
                        <div class="panel-body">
                        <form 
                        role="form" 
                        action="{{ route('stripe.post') }}" 
                        method="post" 
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                        <div class="row">
                        <div class="col-xs-12">
                        <div class="form-group">
                        <div class="input-group">
                            @csrf
                            
                        <input 
                        type="tel"
                        class="form-control card-number"
                        name="cardNumber"
                        placeholder="Valid Card Number"
                        autocomplete="cc-number"
                        required autofocus 
                         maxlength="16"/>
                       
                        <input type="text" name="price_id" value="611b93134e530000ba00614e" hidden>
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                        </div>
                        </div>                            
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-xs-3 col-md-3">
                        <div class="form-group">
                        <label for="cardExpiry"><span class="visible-xs-inline"></span> MONTH</label>
                        <input 
                        type="tel" 
                        maxlength="2"
                        class="form-control card-expiry-month" 
                        name="cardExpiry"
                        placeholder="MM"
                        autocomplete="cc-exp"
                        required 
                        />
                       
                        </div>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                            <label for="cardExpiry"><span class="visible-xs-inline"></span> YEAR</label>
                            <input 
                            type="tel" 
                            class="form-control card-expiry-year" 
                            name="cardExpiry"
                            placeholder="YYYY"
                            maxlength="4"
                            autocomplete="cc-exp"
                            required 
                            />
                           
                            </div>
                            </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                        <div class="form-group">
                        <label for="cardCVC">CV CODE</label>
                        <input 
                        type="tel" 
                        class="form-control card-cvc"
                        name="cardCVC"
                        placeholder="CVC"
                        autocomplete="cc-csc"
                        maxlength="3"
                        required
                        />
                        </div>
                        </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide' id="hide" style="display: none">
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-xs-12">
                        <button class="btn btn-success btn-lg btn-block" id="button_submit" type="submit">Start Subscription</button>
                        </div>
                        </div>
                      
                        </form>
                        </div>
                        </div>            
                        <!-- CREDIT CARD FORM ENDS HERE -->
                        
                        
                        </div>            
                        
                        
                        
                        </div>
                        </div>
                   
                                  
                                    <!--end form-->
                                </div><!--end /div-->
                              
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
        
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        $("#button_submit").attr("disabled", true);

        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
                document.getElementById("hide").style.display = "block";
                $("#button_submit").attr("disabled", false);


        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    env: 'sandbox', // Or 'production'
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
    },
    // Set up the payment:
    // 1. Add a payment callback
    payment: function (data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/api/create-paypal-transaction')
        .then(function (res) {
          // 3. Return res.id from the response
          // console.log(res);
          return res.id
        })
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function (data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/api/confirm-paypal-transaction', {
        payment_id: data.paymentID,
        payer_id: data.payerID
      })
        .then(function (res) {
          console.log(res)
          alert('Payment successfully done!!')
          // 3. Show the buyer a confirmation message.
        })
    }
  }, '#paypal-button')
</script>
<script>
      $( document ).ready(function() {
   $("#stripe_submit").click(function(){
    document.getElementById("stripe_form").style.display = "block";
 
   });
});
</script>


</html>