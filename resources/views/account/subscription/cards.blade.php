

<x-account-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h4>Kart Bilgiler</h4>

            <x-alert-message />


            
            <table>
                
                <tbody>
                    @foreach ($paymentMethods as $method)
                        <tr>
                            <td> 
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    {{ $method->card->display_brand }}
                                </span>
                                <span class="rounded">
                                    **** **** **** {{ $method->card->last4 }}
                                </span>
                            </td>
                            <td>
                                @if (!$loop->first)
                                <a class="text-red-800" href="{{ route('account.subscription.edit_card.remove', $method->id)}}">Sil</a>
                                @endif

                                <a  href="{{ route('account.subscription.edit_card.item', $method->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-1.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Değiştir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div>
                
            </div>
           

        </div>
    </div>
</x-account-layout>