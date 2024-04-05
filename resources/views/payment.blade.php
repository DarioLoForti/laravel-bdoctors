@extends('layouts.style')

@section('content')

    <body>
        <div class="container">
            <div>
                Conferma il pagamento di <strong>{{$sponsorship->price}}</strong> euro
                per <strong>{{$sponsorship->name}}</strong>, della durata di <strong>{{$sponsorship->duration}}</strong> ore?
            </div>
        </div>
        <div class="py-12">
            @csrf
            <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
            <div style="display: flex;justify-content: center;align-items: center; color: white">
                <a id="submit-button" class="btn btn-sm btn-success">Paga</a>
                <a href="javascript:history.back()" class="btn btn-sm btn-secondary ms-2">Indietro</a>
            </div>
            <!-- Aggiunta del div per il messaggio di conferma -->
            <div id="success-message" class="alert alert-success text-center" style="display:none; margin-top: 10px;">
                Pagamento avvenuto con successo!
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
        </div>
    </body>
@endsection
