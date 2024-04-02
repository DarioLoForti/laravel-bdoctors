<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.14.1/js/dropin.min.js"></script>
</head>
<body>
    <div class="py-12">
        @csrf
        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
        <div style="display: flex;justify-content: center;align-items: center; color: white">
            <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
        </div>
        <script>
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
                authorization: '{{$token}}',
                container: '#dropin-container'
            }, function (createErr, instance) {
                button.addEventListener('click', function () {
                    instance.requestPaymentMethod(function (err, payload) {
                        (function($) {
                            $(function() {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('token')}}",
                                    data: {nonce : payload.nonce},
                                    success: function (data) {
                                        console.log('success',payload.nonce)
                                    },
                                    error: function (data) {
                                        console.log('error',payload.nonce)
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