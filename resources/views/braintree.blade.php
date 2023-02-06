<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        .btn-style {
            display: flex;
            justify-content: center;
            align-items: center;
            color: white
        }

        #dropin-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        @csrf
        <div id="dropin-container"> </div>
        <div class="btn-style">
            <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
        </div>

        <script>
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
                    authorization: '{{ $token }}',
                    container: '#dropin-container'
                },
                function(createErr, instance) {
                    button.addEventListener('click', function() {
                        // instance.requestPaymentMethod(function(err, payload) {
                        //     // Submit payload.nonce to your server
                        // });
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
                                            nonce: payload.nonce
                                        },
                                        success: function(data) {
                                            console.log('success', payload.nonce)
                                        },
                                        error: function(data) {
                                            console.log('error', payload.nonce)
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

</html>
