

<x-account-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            Abonelik
            @if(auth()->user()->subscribed('default'))
            <div>
                Abonelik sona başlangıç tarihi:{{ 
                    \Carbon\Carbon::parse(
                            auth()->user()->subscription('default')->created_at
                        )->locale('TR')->toFormattedDateString() }} 
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ 
                    \Carbon\Carbon::parse(
                            auth()->user()->subscription('default')->created_at
                        )->locale('TR')->diffForHumans() }}</span>
            </div>
            @endif
            <div>

                @if(auth()->user()->subscribed('default'))

                  

                    @if(auth()->user()->subscription('default')->cancelled())
                    Abonelik bitiş tarihi: {{ 
                        \Carbon\Carbon::createFromTimeStamp(
                            auth()->user()->subscription('default')->asStripeSubscription()->current_period_end
                        )->toFormattedDateString()
                    }}
                    {{
                        \Carbon\Carbon::parse(
                            auth()->user()->subscription('default')->asStripeSubscription()->current_period_end
                        )->locale('TR')->diffForHumans()
                    }}
                    @else
                    
                    Sonraki ödeme tarihi: {{ 
                        \Carbon\Carbon::createFromTimeStamp(
                            auth()->user()->subscription('default')->asStripeSubscription()->current_period_end
                        )->toFormattedDateString()
                    }}
                    {{
                        \Carbon\Carbon::parse(
                            auth()->user()->subscription('default')->asStripeSubscription()->current_period_end
                        )->locale('TR')->diffForHumans()
                    }}
                    @endif
                @else
                    Abonelik mevcut değil veya iptal edildi
                @endif
            </div>
            @if(auth()->user()->subscribed('default'))

                @can('resume', auth()->user())
                    @if(auth()->user()->subscription('default')->cancelled())
                        <div class="mb-10">
                        
                            <form action="{{ route('account.subscription.resume')}}" method="POST">
                                @csrf
                
                                <x-button class="ml-3">
                                    {{ __('DEVAM ETTIR') }}
                                </x-button>
                
                            </form>
                        </div>
                    @endif
                @endcan

                
            @endif
        </div>
    </div>
</x-account-layout>