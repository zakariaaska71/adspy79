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
    <title>Payment Page</title>

</head>
@include('front.nav')
<div class="container">
    <form method="post" action="seller/subscribe" id="subscribe-form" >
        @csrf
        <input type="hidden" name="plan_name" value='{{ $plan->name }}'>
        <input type="radio" checked hidden id="plan-silver" name="plan" value='{{$plan->paln_id}}'>
        <div class="card text-center">
            <div class="card-header">
            Subscripe To  {{ $plan->name }}
            </div>
            <div class="card-body">
              <h5 class="card-title">{!! $plan->dec !!}</h5>
              <p class="card-text"><sup>$</sup> {{ $plan->price  }}<span> per {{ $plan->duration }}</p>
              <a class="radio_option btn btn-info" class="btn btn-primary"> Subscripe Now</a>
            </div>
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
<script>
    $('.radio_option').click(function() {
        $('#show_form').show();
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"
    integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="{{ asset('new_style/js/prof.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {
        hidePostalCode: true,
        style: style
    });
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        console.log("attempting");
        const {
            setupIntent,
            error
        } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });

    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>

</html>
