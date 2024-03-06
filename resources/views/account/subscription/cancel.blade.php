

<x-account-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('account.subscription.cancel')}}" method="POST">
                @csrf

                
                <x-button class="ml-3">
                    {{ __('İPTAL ET') }}
                </x-button>

            </form>
        </div>
    </div>
</x-account-layout>