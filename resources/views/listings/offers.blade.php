<x-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-16">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Sender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                </tr>
            </thead>
            @foreach ($offers as $offer)
                <tbody>
                    @php
                        $sender = \App\Models\User::find($offer->sender_id);
                        $sender_name = $sender['name'];
                    @endphp
                    <tr class="bg-white hover:bg-gray-50 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sender_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $offer['sender_email'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $offer['phone_number'] }}
                        </td>
                        <td class="px-6 py-4 max-w-sm">
                            <p class="max-w-md format lg:format-lg format-red">
                                {{ $offer['description'] }}
                            </p>

                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <button
                                    class="bg-green-500 text-white font-medium py-2 px-4 rounded-md mb-2 hover:bg-green-600">
                                    Accept
                                </button>
                                <button class="bg-red-500 text-white font-medium py-2 px-4 rounded-md hover:bg-red-600">
                                    Decline
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            @endforeach
        </table>
    </div>

</x-layout>
