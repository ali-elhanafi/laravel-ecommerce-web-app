<x-home-master>
    @section('content')
        <div class="row">
            <div class="col"></div>
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-6">
                <h1>CheckOut</h1>
                <h4>Total: ${{$total}}</h4>
                <div class="container-md">
                    @if(Session::has('error'))
                        <div id="charge-error" class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif

                        <form
                            role="form"
                            action="{{ route('check') }}"
                            method="post"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input
                                        class='form-control' size='4' type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input
                                        autocomplete='off' class='form-control card-number' size='20'
                                        type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                                    type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>
{{--                            <div class='form-row row'>--}}
{{--                                <div class='col-md-12 error form-group hide'>--}}
{{--                                    <div class='alert-danger alert'>Please correct the errors and try--}}
{{--                                        again.--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </form>

{{--                    <form action="{{route('check')}}" method="post" id="checkout-form">--}}
{{--                        @csrf--}}
{{--                        @method('POST')--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-auto">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="name">Name</label>--}}
{{--                                    <input type="text" id="name" class="form-group" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-auto">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="address">Address</label>--}}
{{--                                    <input type="text" id="address" class="form-group" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-auto">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="card-name">Card Holder Name</label>--}}
{{--                                    <input type="text" id="card-name" class="form-group" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-auto">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="card-number">Credit Card Number</label>--}}
{{--                                    <input type="text" id="card-number" class="form-group" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="card-expiry-month">Expiration Month</label>--}}
{{--                                    <input type="text" id="card-expiry-month" class="form-group" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="card-expiry-year">Expiration Year</label>--}}
{{--                                    <input type="text" id="card-expiry-year" class="form-group" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="card-cvc">CVC</label>--}}
{{--                                    <input type="text" id="card-CVC" class="form-group" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <button type="submit" class="btn btn-success">Buy now</button>--}}

{{--                    </form>--}}
                </div>
            </div>
            <div class="col"></div>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">
            $(function() {
                var $form = $(".require-validation");
                $('form.require-validation').bind('submit', function(e) {
                    var $form = $(".require-validation"),
                        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'
                        ].join(', '),
                        $inputs = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid = true;
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
                        /* token contains id, last4, and card type */
                        var token = response['id'];
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            });
        </script>

    @endsection

</x-home-master>
