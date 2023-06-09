<x-layout>
    <div class="overflow-x-auto shadow-md sm:rounded-lg m-16">
        <div class="overflow-x-auto ">
            <h2 class="text-2xl mb-3 font-extrabold dark:text-black">Offers</h2>
        </div>
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

            @php
                $showoffer = $offers->where('receiver_id', auth()->id())->where('is_active', true);
            @endphp
            @if (count($showoffer) > 0)
                @foreach ($offers as $offer)
                    @if ($offer->is_active == true)
                        @php
                            $sender = \App\Models\User::find($offer->sender_id);
                            $sender_name = $sender['name'];
                        @endphp
                        <tbody>
                            <tr class="bg-white hover:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $offer['company_name'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $offer['sender_email'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $offer['phone_number'] }}
                                </td>
                                <td class="px-6 py-4">

                                    <p class="max-w-md break-words text-base leading-normal text-gray-800">
                                        {{ $offer['description'] }}
                                    </p>

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <form method="POST" action="/offers/{{ $offer['id'] }}/accept"
                                            class="bg-green-500 text-white font-medium py-2 px-4 rounded-md mb-2 hover:bg-green-600 text-center">
                                            @csrf
                                            @method ('PUT')
                                            <button class="">Accept</button>
                                        </form>
                                        <form method="POST" action="/offers/{{ $offer['id'] }}/decline"
                                            class="bg-red-500 text-white font-medium py-2 px-4 rounded-md hover:bg-red-600 text-center">
                                            @csrf
                                            @method ('DELETE')
                                            <button class="">Decline</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endif
                @endforeach
            @elseif (count($showoffer) == 0)
                <tbody>
                    <tr class="text-lg align-items-center border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center" colspan="6">
                            <p class="text-lg">No Offer Found</p>
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>
    <div class="overflow-x-auto m-16">
        @php
            $applications = App\Models\Applications::where('sender_id', auth()->user()->id)
                ->where('show_history', true)
                ->get();
        @endphp
        <h2 class="text-2xl mb-3 font-extrabold dark:text-black">Submitted Applications</h2>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Company Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>

            @if (count($applications) > 0)
                @foreach ($applications as $application)
                    @php
                        $receiver_list_id = $application['receiver_listing_id'];
                        $listing = App\Models\Listing::find($receiver_list_id);
                    @endphp
                    <tbody class="align-items-center">
                        <tr class="bg-white hover:bg-gray-50 ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $listing->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $application->status }}
                            </td>
                            @if ($application->status == 'Pending')
                                <td class="px-6 py-4">
                                    -
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    <form method="POST" action="/offers/{{ $application['id'] }}/markreadapplication"
                                        class="bg-blue-500 inline-block text-white font-medium py-1 px-2 rounded-md mb-2 hover:bg-blue-600">
                                        @csrf
                                        @method ('PUT')
                                        <button type="submit" class="text-sm">Mark as read</button>
                                    </form>
                                </td>
                            @endif
                        </tr>

                    </tbody>
                @endforeach
            @elseif (count($applications) == 0)
                <tbody>
                    <tr class="text-lg align-items-center border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center" colspan="6">
                            <p class="text-lg">No Application Submitted</p>
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>
    </div>
</x-layout>
