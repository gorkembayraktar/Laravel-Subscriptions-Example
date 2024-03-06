

<x-account-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h4>Kart Bilgiler</h4>
            <x-alert-message />
            @if ($user->hasPaymentMethod())
                <p>Kayıtlı Kart Bilgisi: {{ $user->defaultPaymentMethod()->card->brand }} **** **** **** {{ $user->defaultPaymentMethod()->card->last4 }}</p>
            @endif

            <form id="cardForm" action="{{ route('account.subscription.edit_card.item', $paymentMethodId) }}" method="POST">
                @csrf

                <div>
                    <x-label for="name" :value="__('Kartın Adı')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div>
                    <x-label for="card" :value="__('Kart Detay')" />
                    <div id="card-element"></div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button id="payButtton" class="ml-3" data-secret="{{$intent->client_secret}}">
                        {{ __("ONAYLA") }}
                    </x-button>
                </div>
              </form>

        </div>
    </div>

    <script>
        const stripe = Stripe('{{config('cashier.key')}}');
        const elements=stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount("#card-element");

        const form = document.querySelector('#cardForm');
        const payButtton = document.querySelector('#payButtton');
        const cardName = document.querySelector('#name');
        form.onsubmit = async(e) =>{
            e.preventDefault();

            payButtton.disabled = true;

           const {setupIntent, error} =  await stripe.confirmCardSetup(
                payButtton.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardName.value
                        }
                    },
                     // 3D Secure'ı etkinleştirme
                    use_stripe_sdk: true,
                }
            );

            if(error){
                payButtton.disabled = false;
            }else{

                let token = document.createElement('input');
                token.setAttribute('type', 'hidden');
                token.setAttribute('name', 'token');
                token.setAttribute('value', setupIntent.payment_method);
                form.appendChild(token);
                form.submit();
                
            }
           

        }

    </script>
</x-account-layout>