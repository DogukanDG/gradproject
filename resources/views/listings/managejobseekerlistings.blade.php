<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Listings
                </h1>
            </header>
            @if (auth()->user()->role == 'job-seeker')
                <table class="w-full table-auto rounded-sm">
                    <tbody>
                        @php
                            $showlist = $jobseekerlistings->where('user_id', auth()->id())->where('is_active', true);
                        @endphp
                        @if (count($showlist) > 0)
                            @foreach ($showlist as $jobseekerlisting)
                                @if ($jobseekerlisting->is_active)
                                    <tr class="border-gray-300">
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                            <a href="/job-seekers/{{ $jobseekerlisting['id'] }}">
                                                {{ $jobseekerlisting['title'] }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                            <a href="/job-seekers/{{ $jobseekerlisting['id'] }}/edit"
                                                class="text-blue-400 px-6 py-2 rounded-xl"><i
                                                    class="fa-solid fa-pen-to-square"></i>
                                                Edit</a>
                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                            <form method="POST"
                                                action="/job-seekers/{{ $jobseekerlisting['id'] }} class">
                                                @csrf
                                                @method ('DELETE')
                                                <button class="text-red-500"><i
                                                        class="fa-solid fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                            <form action="/generate-pdf">

                                                <input type="hidden" name="jobseekerListing"
                                                    value="{{ $jobseekerlisting }}">
                                                <button class="text-green-500"><i
                                                        class="fa-solid fa-download"></i>Export As
                                                    Pdf</button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                            <form
                                                action="{{ route('jobseekerlistings.applysearch', ['jobseekerlisting' => $jobseekerlisting]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <button class="text-black-500"><i class="fa-solid fa-search"></i>Apply
                                                    Search</button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                            <form method="POST"
                                                action="/job-seekers/{{ $jobseekerlisting['id'] }}/renew">
                                                @csrf {{-- This is for preventing people from submiting a form from their website to yours --}}
                                                @method('PUT')
                                                <button class="text-black-500"><i
                                                        class="fa-solid fa-refresh"></i>Renew</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                        @if (count($showlist) == 0)
                            <tr class="text-lg align-items-center border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg align-items-center">
                                    <p class="text-lg">No Listing Found</p>
                                </td>
                            </tr>
                        @endif


                    </tbody>
                </table>


            @endif
            @php
                $route = auth()->user()->role;
                if ($route == 'employer') {
                    $route = 'create';
                } elseif ($route == 'job-seeker') {
                    $route = 'createjobseeker';
                }
            @endphp
            <button class="mt-4 bg-black text-white py-2 px-5"><a href={{ $route }}>Add
                    Listing
                    +</a></button>
        </div>
    </div>


</x-layout>
