<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planlar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mx-auto content-center">
                        @foreach ($plans as $plan)
                            <div class="p-4 border rounded text-center">
                                <h2 class="font-semibold">{{ $plan->title }}</h2>
                                <p class="text-gray-600">{{ $plan->price }} ₺</p>
                                <p class="text-sm text-gray-500">{{ $plan->description }}</p>
                                <div class="mt-5">
                                    <a  href="{{ route('subscriptions.subscriptions', ['plan' => $plan->slug]) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Satın AL
                                    </a>

                                </div>
                            
                            </div>
                        @endforeach
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
