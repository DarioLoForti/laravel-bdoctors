@extends('layouts.style')

@section('content')
    <style>
        .card {
            border: 2px solid white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }
        .color-blue{
            color: #285a8c;
           
        }

        #success-message {
            margin-top: 20px;
            display: none;
        }

        .braintree-card {
            max-width: 400px
        }

        .braintree-upper-container:before {
            background-color: white
        }
        .braintree-upper-container{
            z-index: unset;
        }
        .braintree-card{
            position: relative;
            border-radius: 20px;
            background-color: transparent;
            min-height: 450px;
        }
        .braintree-form__field-group{
            margin: 30px 0px;
        }
        .braintree-sheet{
            border: 2px solid white;
        }
        .braintree-sheet__header{
            border-bottom: 2px solid white;
            
        }
        .braintree-sheet__text{
            color: white !important;
            text-transform: uppercase;
            font-size: 18px !important;

        }
        .braintree-form__label{
            color: white !important;
            text-transform: uppercase;
            font-size: 18px !important;
        }
        .braintree-form__field{
            background-color: white;
            border-radius: 10px;
        } 
        .braintree-form__descriptor{
            color: white !important;
        }
        .braintree-sheet__content--form .braintree-form__field-group .braintree-form__field .braintree-form__hosted-field{
            border: 2px solid white ;
            border-radius: 10px;
        }
        

        
    </style>
        <div class="altezza-sponsor bg-linear-gradient pb-5">
            <div class="container pt-5 ">
                <div class="card text-center py-3 bg-transparent ">
                    <div class=" text-white">
                        <h4 class="mb-3">Riepilogo Pagamento</h4>
                        <p>Si sta procedendo al pagamento di <strong class="color-blue">{{ $sponsorship->name }}</strong> della durata di
                            <strong class="color-blue">{{ $sponsorship->duration }} ore</strong>, per 
                            <strong class="color-blue">{{ $sponsorship->price }} €</strong>.
                        </p>
                    </div>
                </div>
                {{-- <div class="position-img">
                    <img src="{{ Vite::asset('resources/img/carta.png') }}" alt="">
                </div> --}}
                <div class="py-4 text-center">
                    @csrf
                    <div id="dropin-container"></div>
                    <div>
                        <button id="submit-button" class="btn btn-success">Paga {{ $sponsorship->price }} € </button>
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
@endsection
