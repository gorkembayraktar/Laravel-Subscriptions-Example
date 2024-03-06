<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hesap') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 md:space-y-0 md:grid grid-cols-8 gap-6">
       <div class="col-span-2 px-3">
            <ul style="list-style: none">
                <div class="mb-10">
                    <li><a href="{{ route('account')}}" class="hover:text-blue-500">Hesap</a></li>
                </div>
                <div class="mb-10">
                    <li><a href="{{ route('account.subscription')}}" class="hover:text-blue-500">Abonelik</a></li>
                </div>

                <div class="mb-10">
                    <li><a href="{{ route('account.subscription.edit_card')}}" class="hover:text-blue-500">Kart Bilgileri</a></li>
                </div>
            
                @if(auth()->user()->subscribed())
                    @can('cancel', auth()->user())
                        <div class="mb-10">
                            <li><a href="{{ route('account.subscription.cancel')}}" class="hover:text-blue-500">Abonelik İptal</a></li>
                        </div>
                    @endcan
                @endif
            </ul>
       </div>
       <div class="col-span-6">
            {{ $slot }}
       </div>
    </div>
</x-app-layout>
