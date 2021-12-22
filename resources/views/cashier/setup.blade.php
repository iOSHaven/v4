@extends('layouts.redesign', ["hide_ads" => true])

@section('content')
<div class="bg-gray-100 rounded border w-1/2 mx-auto p-3 ">
    <i class="fas fa-user text-gray-300 ml-3 mr-1"></i>
    <input id="card-holder-name" class="p-1 bg-transparent" type="text" placeholder="Cardholder">

    <!-- Stripe Elements Placeholder -->
    <div id="card-element" class="p-3 my-3"></div>

    <button id="card-button" class="p-3 bg-blue-500 text-white-light" data-secret="{{ $intent->client_secret }}">
        Update Payment Method
    </button>
</div>


<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');


    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
        const { setupIntent, error } = await stripe.handleCardSetup(
            clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            console.error(error)
        } else {
            console.log('success', setupIntent.payment_method)
        }
    });
</script>
@endsection