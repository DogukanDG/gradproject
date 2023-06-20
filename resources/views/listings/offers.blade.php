<x-layout>
    <div class="overflow-x-auto shadow-md sm:rounded-lg m-16">
        <div class="overflow-x-auto ">
            <h2 class="text-2xl mb-3 font-extrabold dark:text-black">Offers</h2>
        </div>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-3">
                        Sender
                    </th>
                    <th scope="col" class="">
                        Contact Email
                    </th>
                    <th scope="col" class="">
                        Phone Number
                    </th>
                    <th scope="col" class="">
                        Recieve Date
                    </th>
                    <th scope="col" class="px-12  py-3">
                        Description
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        Sent From
                    </th> --}}
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
                            <tr class=" bg-white hover:bg-gray-50 ">
                                <th scope="row" class="px-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $offer['company_name'] }}
                                </th>
                                <td class="">
                                    {{ $offer['sender_email'] }}
                                </td>
                                <td class="">
                                    {{ $offer['phone_number'] }}
                                </td>
                                <td class=" ">
                                    {{ $offer['created_at']->format('Y-m-d') }}
                                </td>
                                <td class="px-12 py-3">
                                    <div>
                                        <p class="overflow-hidden max-w-md mt-5 break-words transition-all duration-500 text-base leading-normal text-gray-800 truncate"
                                            id="description">
                                            {{ \Illuminate\Support\Str::words($offer['description'], 50) }}
                                        </p>
                                        <button class="text-blue-500 font-bold mt-2" id="read-more-btn">Read
                                            More</button>
                                        <p class="hidden" id="remaining-description">{{ $offer['description'] }}
                                        </p>
                                    </div>
                                </td>
                                <script src="{{ asset('app.js') }}"></script>
                                <script>
                                    function toggleDescription() {
                                        var description = document.getElementById('description');
                                        var remainingDescription = document.getElementById('remaining-description');
                                        var readMoreBtn = document.getElementById('read-more-btn');

                                        if (description.classList.contains('truncate')) {
                                            description.textContent = remainingDescription.textContent;
                                            description.classList.remove('truncate');
                                            readMoreBtn.textContent = 'Read Less';
                                        } else {
                                            description.textContent = truncateDescription(remainingDescription.textContent);
                                            description.classList.add('truncate');
                                            readMoreBtn.textContent = 'Read More';
                                        }
                                    }

                                    function truncateDescription(description, words) {
                                        var wordArray = description.trim().split(' ');
                                        var truncatedArray = wordArray.slice(0, words);
                                        var truncatedDescription = truncatedArray.join(' ');

                                        if (wordArray.length > words) {
                                            truncatedDescription += '...';
                                        }

                                        return truncatedDescription;
                                    }

                                    document.getElementById('read-more-btn').addEventListener('click', toggleDescription);
                                </script>
                                {{-- <td class="px-6 py-4">
                                    @php
                                        $findlisting = App\Models\JobSeekerListing::find();
                                    @endphp
                                    <a href="/job-seekers/{{ $offer->receiver_listing_id }}"
                                        class="max-w-md break-words text-base leading-normal text-gray-800 text-center hover:underline">
                                        {{ $findlisting['title'] }}
                                    </a>
                                </td> --}}
                                <td class="">
                                    <div class="flex flex-col">
                                        <form method="POST" action="/offers/{{ $offer['id'] }}/accept"
                                            class="w-20 bg-green-500 text-white font-medium py-2 px-4 rounded-md mb-2 hover:bg-green-600 text-center">
                                            @csrf
                                            @method ('PUT')
                                            <button class="">Accept</button>
                                        </form>
                                        <form method="POST" action="/offers/{{ $offer['id'] }}/decline"
                                            class="w-20 bg-red-500 text-white font-medium py-2 px-4 rounded-md hover:bg-red-600 text-center">
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
