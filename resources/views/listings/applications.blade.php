<x-layout>

    <div class="overflow-x-auto shadow-md sm:rounded-lg m-16">
        <h2 class="text-2xl mb-3 font-extrabold dark:text-black">Applications</h2>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class=" px-3 py-3">
                        Sender
                    </th>
                    <th scope="col" class="py-3">
                        Contact Email
                    </th>
                    <th scope="col" class="py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="py-3 text-center">
                        Expire Date
                    </th>
                    <th scope="col" class="py-3 text-center">
                        Description
                    </th>
                    <th scope="col" class="py-3">
                        Sent From
                    </th>

                    <th scope="col" class=" py-3 text-center">
                        CV
                    </th>

                </tr>
            </thead>
            @php
                $showapplication = $applications->where('receiver_id', auth()->id())->where('is_active', true);
            @endphp
            @if (count($showapplication) > 0)
                @foreach ($applications as $application)
                    @if ($application->is_active == true)
                        <tbody>
                            @php
                                $sender = \App\Models\User::find($application->sender_id);
                                $sender_name = $sender['name'];
                                $findAllListing = \App\Models\JobSeekerListing::where('user_id', $application->sender_id)->get();
                                $descriptionId = 'description_' . $application->id;
                                $buttonId = 'read_more_btn_' . $application->id;
                                $remainingDescriptionId = 'remaining_description_' . $application->id;
                            @endphp

                            <tr class="bg-white hover:bg-gray-50 ">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap">
                                    <a>{{ $sender_name }} {{ $sender->last_name }}</a>
                                </th>
                                <td class="">
                                    {{ $application['sender_email'] }}
                                </td>
                                <td class="">
                                    {{ $application['phone_number'] }}
                                </td>
                                <td class="">
                                    {{ Carbon\Carbon::parse($application['expiration_date'])->format('Y-m-d') }}
                                </td>
                                <td class="px-12 py-3">
                                    <div>
                                        <p class="overflow-hidden max-w-md mt-5 break-words transition-all duration-500 text-base leading-normal text-gray-800 truncate"
                                            id="{{ $descriptionId }}">
                                            {{ \Illuminate\Support\Str::words($application['description'], 50) }}
                                        </p>
                                        <button class="text-blue-500 font-bold mt-2" id="{{ $buttonId }}"
                                            onclick="toggleDescription('{{ $descriptionId }}', '{{ $remainingDescriptionId }}', '{{ $buttonId }}')">Read
                                            More</button>
                                        <p class="hidden" id="{{ $remainingDescriptionId }}">
                                            {{ $application['description'] }}</p>
                                    </div>
                                </td>

                                <script src="{{ asset('app.js') }}"></script>
                                <script>
                                    function toggleDescription(descriptionId, remainingDescriptionId, buttonId) {
                                        var description = document.getElementById(descriptionId);
                                        var remainingDescription = document.getElementById(remainingDescriptionId);
                                        var readMoreBtn = document.getElementById(buttonId);

                                        if (description.classList.contains('truncate')) {
                                            description.textContent = remainingDescription.textContent;
                                            description.classList.remove('truncate');
                                            readMoreBtn.textContent = 'Read Less';
                                        } else {
                                            description.textContent = truncateDescription(remainingDescription.textContent, 50);
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
                                </script>
                                <td class="
                                 py-4">
                                    @php
                                        $findlisting = App\Models\Listing::find($application['receiver_listing_id']);
                                    @endphp
                                    <a href="/listings/{{ $application->receiver_listing_id }}"
                                        class="max-w-md break-words text-base leading-normal text-gray-800 hover:underline">
                                        {{ $findlisting['title'] }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($application->cv != null)
                                        <p class="w-21 text-center break-words text-base leading-normal text-gray-800">
                                            <a href="{{ route('application.download', ['application' => $application]) }}"
                                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                                    class="fa-solid fa-envelope"></i>
                                                Download CV</a>
                                        </p>
                                    @else
                                        <p class="w-21 text-center break-words text-base leading-normal text-gray-800">
                                            -
                                        </p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <form method="POST" action="/applications/{{ $application['id'] }}/accept"
                                            class="bg-green-500 text-white font-medium py-2 px-4 rounded-md mb-2 hover:bg-green-600 text-center">
                                            @csrf
                                            @method ('PUT')
                                            <button class="">Accept</button>
                                        </form>
                                        <form method="POST" action="/applications/{{ $application['id'] }}/decline"
                                            class="bg-red-500 text-white font-medium py-2 px-4 rounded-md hover:bg-red-600 text-center">
                                            @csrf
                                            @method ('DELETE')
                                            <button class="">Decline</button>
                                        </form>
                                        <form method="POST" action="/applications/{{ $application['id'] }}/renew"
                                            class="bg-blue-500 mt-2 text-white font-medium py-2 px-4 rounded-md hover:bg-blue-600 text-center">
                                            @csrf
                                            @method('PUT')
                                            <button class="">Renew</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endif
                @endforeach
            @elseif (count($showapplication) == 0)
                <tbody>
                    <tr class="text-lg align-items-center border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center" colspan="6">
                            <p class="text-lg">No Applications Found</p>
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>


    </div>
    <div class="overflow-x-auto m-16">
        @php
            $offers = App\Models\Offers::where('sender_id', auth()->user()->id)
                ->where('show_history', true)
                ->get();
        @endphp
        <h2 class="text-2xl mb-3 font-extrabold dark:text-black">Submitted Offers</h2>

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sent Date
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>

            @if (count($offers) > 0)
                @foreach ($offers as $offer)
                    @php
                        $user_id = $offer['receiver_id'];
                        $user = App\Models\User::find($user_id);
                        $jobSeekerListing = App\Models\jobSeekerListing::find($offer['receiver_id']);
                    @endphp
                    <tbody class="">
                        <tr class="bg-white hover:bg-gray-50 ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->name }} {{ $user->last_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $offer->status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $offer->created_at->format('Y-m-d') }}
                            </td>
                            @if ($offer->status == 'Pending')
                                <td class="px-6 py-4">

                                </td>
                            @else
                                <td class="px-6 py-4">
                                    <form method="POST" action="/applications/{{ $offer['id'] }}/markreadoffer"
                                        class="bg-blue-500 inline-block text-white font-medium py-1 px-2 rounded-md mb-2 hover:bg-blue-600">
                                        @csrf
                                        @method ('PUT')
                                        <button type="submit" class="text-sm">Mark as read</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        </tr>
                    </tbody>
                @endforeach
            @elseif (count($offers) == 0)
                <tbody>
                    <tr class="text-lg align-items-center border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-center" colspan="6">
                            <p class="text-lg">No Offer Submitted</p>
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
</x-layout>
