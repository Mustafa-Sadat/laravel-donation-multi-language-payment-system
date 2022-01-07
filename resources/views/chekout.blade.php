<!DOCTYPE html>
<html>
<head>
    <title>Checkout-donation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="{{url('public/assets/images/logo.png')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin|'Open Sans'|sans-serif">
    
    <style type="text/css">

        body{
            background-color: #f6f9fc !important;

            font-family:'Cabin','Open Sans', sans-serisf ;
            font-weight: 400;
            font-style: normal;
            font-feature-settings: "pnum";
            font-variant-numeric: proportional-nums;
            
        }


        .panel-title {
            display: inline;
            font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }

        .shadow{
            box-shadow: 0px 2px 6px #cccccc !important;
        }
        .form-control:focus{
            border:none !important;
            
            box-shadow: none;
            border-bottom:1px solid !important;
            border-color: #69bb4d  !important;
        }

        .form-control{
            border-radius: 0 !important;
            border:none !important;
            box-shadow: none;
            border-bottom:1px solid  #ccc !important;
            margin-bottom:20px
        
        }
        .control-label{
            font-weight:500;
        }

        .has-error input{
            border-radius: 0 !important;
            border:none !important;
            box-shadow: none !important;
            border-bottom:1px solid  red !important;
        }

        .has-error input:focus{
            border:none !important;
            
            box-shadow: none;
            border-bottom:1px solid !important;
            border-color: red  !important;
        }

        .panel-default{
            padding:60px 100px !important;
        }


        @media screen and (max-width:768px){
            .panel-default{
            padding:30px 30px !important;
        }
        }

    </style>






</head>
<body>
    
    <div class="container" style="margin-top: 40px">
       
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default credit-card-box shadow">
                    <div class="text-center " style="margin-bottom:20px;">
                        <a href="{{url('/')}}">
                            <img src="{{url('public/assets/images/logo.png')}}" alt="" style="height:100px">
                        </a>
                    </div>
                   
                    <div class="panel-body">
                        
                        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                        
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                autocomplete='off' class='form-control card-number' placeholder="---- ---- ---- ----" type="text" size="19" name="ccnum" id="ccnum">
                            </div>
                        </div>
                        
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                class='form-control card-cvc' placeholder="---"  size="4" type="text" name="cvc" id="cvc">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month' placeholder='MM' maxlength = "2"
                                type='text' onkeypress="return onlyNumberKey(event)">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year' placeholder='YYYY' maxlength = "4"
                                type='text' onkeypress="return onlyNumberKey(event)">
                            </div>
                        </div>
                        
                        <div class='form-row row' style="margin-top:20px;">
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-lg btn-block" type="submit"  style="background:#358819;color:white; ">Pay Now (<span style="font-weight:200px; margin-right:2px;">£</span> {{$total}})</button>
                                </div>
                            </div>
                            

                            <div class="row" style="margin-top:20px;">
                                <div class="col-xs-12">
                                    <a href="{{url('payment')}}/{{$total}}" class="btn btn-primary btn-block" style="background:#0070ba">
                                        <span class="fa fa-paypal " id="linkButton"> </span> PayPal 
                                    </a>
                                </div>
                            </div>

                            <input type="hidden" name="request_total" value="{{$total}}" >
                        </form>
                    </div>
                </div>        
            </div>
        </div>
        
    </div>
    

</body>


<script src="{{url('public/js/payform.min.js')}}" ></script>
<script>
    var ccnum  = document.getElementById('ccnum'),
    cvc    = document.getElementById('cvc');
    
    payform.cardNumberInput(ccnum);
    payform.cvcInput(cvc);


    function onlyNumberKey(evt) {
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }

</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {
        var $form         = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
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
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
        
    });
</script>




   

</html>