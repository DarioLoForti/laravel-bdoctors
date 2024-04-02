@extends('layouts.style')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex">

                {{-- DASHBOARD SIDEBAR --}}

                <div class="col-2">
                    <div class="container-fluid">
                        <div class="row flex-nowrap">
                            <div class="col-12 px-sm-2 px-0 bg-doctorblu">
                                <div
                                    class="d-flex flex-column align-items-center align-items-sm-start mx-2 mt-2 text-white vh-100">
                                    <a href="/"
                                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                                    </a>
                                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                                        id="menu">

                                        {{-- <li class="nav-item mb-2 px-2">
                                            <a class="nav-link align-middle  text-white ombra" href="{{ url('/') }}"><i
                                                    class="fa-solid fa-house me-2"
                                                    style="color: #ffffff;"></i>{{ __('Home') }}
                                            </a>
                                        </li> --}}

                                        <li class="nav-item mb-2 px-2">
                                            <a href="{{ route('admin.doctors.index') }}" class="nav-link  ombra">
                                                <i class="fa-solid fa-user-doctor" style="color: #ffffff;"></i>
                                                <span class="ms-1 d-none d-sm-inline text-white ">Profilo</span>
                                            </a>
                                        </li>

                                        <li class="nav-item mb-2 px-2">
                                            <a href="{{ route('messages.index') }}" class="nav-link ombra">
                                                <i class="fa-solid fa-message" style="color: #ffffff;"></i>
                                                <span class="ms-1 d-none d-sm-inline text-white">Messaggi</span>
                                            </a>
                                        </li>

                                        
                                        <li class="nav-item mb-2 px-2">
                                            <a href="{{ route('reviews.index') }}" class="nav-link ombra">
                                                <i class="fa-solid fa-book-open" style="color: #ffffff;"></i>
                                                <span class="ms-1 d-none d-sm-inline text-white">Recensioni</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mb-2 px-2">
                                            <a href="" class="nav-link ombra">
                                                <i class="fa-solid fa-chart-line" style="color: #ffffff;"></i>
                                                <span class="ms-1 d-none d-sm-inline text-white">Statistiche</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DASHBOARD MAIN CONTENT --}}

                <div class="col-10">
                    <div class="container">
                        <h2 class="fs-4 text-myblu my-4">
                            {{ __('Dashboard') }}
                        </h2>
                        <div class="row justify-content-center">

                            {{-- WELCOME HEADER --}}

                            <div class="col-8">
                                <h1 class="text-mygreen mb-5">Benvenuto in BDoctors, Dr.
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }}.
                                </h1>
                            </div>


                            {{-- NOTIFICATION: YOU HAVE BOUGHT NO SPONSORSHIP --}}

                            <div class="row my-3">
                                @if (Auth::user()->doctor->sponsorship == null)
                                    <div
                                        class="col-12 bg-primary p-3 rounded d-flex justify-content-between align-items-center">
                                        <div class="text-white">
                                            Aggiungi una sponsorizzazione per avere maggiore visibilità.
                                        </div>
                                        <div class="btn btn-small btn-secondary">
                                            Vedi le nostre Offerte
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.js"></script>
                            <div id="dropin-container"></div>
                            <button id="submit-button" class="button button--small button--green">Purchase</button>

                            {{-- DOCTOR PROFILE PICTURE --}}

                            {{--                             
                                <div class="row">
                                    @if (Auth::user()->doctor)
                                        <div class="col-12">
                                            <div class="jumbo">
                                                <img class="jumbo-img" src="{{ Auth::user()->doctor->image }}">
                                            </div>
                                        </div>
                                    @endif
                                </div> 
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
    authorization: 'sandbox_kttv9mdw_kymtbvfsdckk8hcb',
    selector: '#dropin-container'
    }, function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
        // When the user clicks on the 'Submit payment' button this code will send the
        // encrypted payment information in a variable called a payment method nonce
        $.ajax({
          type: 'POST',
          url: '/checkout',
          data: {'paymentMethodNonce': payload.nonce}
        }).done(function(result) {
          // Tear down the Drop-in UI
          instance.teardown(function (teardownErr) {
            if (teardownErr) {
              console.error('Could not tear down Drop-in UI!');
            } else {
              console.info('Drop-in UI has been torn down!');
              // Remove the 'Submit payment' button
              $('#submit-button').remove();
            }
          });

          if (result.success) {
            $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
          } else {
            console.log(result);
            $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
          }
        });
      });
    });
  });
</script>
@endsection
