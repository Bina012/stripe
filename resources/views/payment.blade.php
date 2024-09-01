<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <form action="{{ route('process.payment') }}" method="POST" id="payment-form">
        @csrf
        <label for="cardholderName">Cardholder's Name</label>
        <input type="text" id="cardholderName" name="cardholderName" required><br>

        <label for="card-element">Credit or debit card</label>
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        <div id="card-errors" role="alert"></div>

        <button id="submit-button">Submit Payment</button>
        <input type="hidden" name="stripeToken" id="stripeToken">
    </form>

    <script>
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        var elements = stripe.elements();

        var card = elements.create('card');
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    document.getElementById('stripeToken').value = result.token.id;
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>
