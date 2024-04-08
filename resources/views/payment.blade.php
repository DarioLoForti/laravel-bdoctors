@extends('layouts.style')

@section('content')
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        #success-message {
            margin-top: 20px;
            display: none;
        }

        .braintree-card {
            width: 400px
        }

        .braintree-upper-container:before {
            background-color: white
        }
        .braintree-upper-container{
            z-index: unset;
        }
        .braintree-card{
            position: relative;
            border-radius: 20px

        }
        .position-img{
          
        }
        

    </style>

    <body>
        <div class="bg-linear-gradient">
            <div class="container pt-5 ">
                <div class="card text-center py-3">
                    <div class="mb-3">
                        <h4 class="mb-3">Conferma Pagamento</h4>
                        <p>Si sta procedendo al pagamento di <strong>{{ $sponsorship->price }}</strong> euro per il servizio
                            <strong>{{ $sponsorship->name }}</strong>, della durata di
                            <strong>{{ $sponsorship->duration }}</strong> ore.
                        </p>
                    </div>
                </div>
                <div class="py-4 text-center">
                    {{-- <div class="position-img">
                        <img src="{{ Vite::asset('resources/img/carta.png') }}" alt="">
                    </div> --}}
                    @csrf
                    <div id="dropin-container"></div>
                    <div>
                        <button id="submit-button" class="btn btn-success">Paga</button>
                        <a href="javascript:history.back()" class="btn btn-secondary ms-2">Indietro</a>
                    </div>
                    <div id="success-message" class="alert alert-success mt-3" style="display: none;">
                        Pagamento avvenuto con successo!
                    </div>
                </div>
            </div>
        </div>
        <script>
            var button = document.querySelector('#submit-button');
            var price = <?php echo json_encode("$price", JSON_HEX_TAG); ?>;

            braintree.dropin.create({
                authorization: '{{ $token }}',
                container: '#dropin-container'
            }, function(createErr, instance) {
                button.addEventListener('click', function() {
                    instance.requestPaymentMethod(function(err, payload) {
                        (function($) {
                            $(function() {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    }
                                });
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('token') }}",
                                    data: {
                                        nonce: payload.nonce,
                                        price: price
                                    },
                                    success: function(data) {
                                        // Visualizza il messaggio di conferma
                                        document.getElementById(
                                                'success-message').style
                                            .display = 'block';

                                        // Reindirizzamento dopo 1 secondo
                                        setTimeout(function() {
                                            window.location.href =
                                                '{{ route('sponsorships.index') }}';
                                        }, 3000);
                                    },
                                    error: function(data) {
                                        alert('Pagamento non eseguito')
                                    }
                                });
                            });
                        })(jQuery);
                    });
                });
            });
        </script>
    </body>
@endsection
