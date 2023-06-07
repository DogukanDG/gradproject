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
                            @endphp
                            <tr class="bg-white hover:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $sender_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $application['sender_email'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $application['phone_number'] }}
                                </td>
                                <td class="px-6 py-4">

                                    <p class="max-w-md break-words text-base leading-normal text-gray-800">
                                        {{ $application['description'] }}
                                    </p>

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
                            <p class="text-lg">No Offer Found</p>
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>
</x-layout>
