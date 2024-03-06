

<x-account-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            Tüm Abonelikler

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Başlangıç tarihi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bitiş tarihi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($subscriptions as $subscription)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $subscription->confirm_start_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $subscription->confirm_end_date }}
                                    </td>
                                </tr>
                            @endforeach
                       
                          
                       
                       
                    </tbody>
                </table>
            </div>
            

           
        </div>
    </div>
</x-account-layout>