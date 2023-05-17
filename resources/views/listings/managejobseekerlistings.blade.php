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
                        @if ($jobseekerlistings)
                            <script>
                                console.log({{ $jobseekerlistings }});
                            </script>
                            @foreach ($jobseekerlistings as $jobseekerlisting)
                                <tr class="border-gray-300">
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                        <a href="show.html">
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
                                        <form method="POST" action="/job-seekers/{{ $jobseekerlisting['id'] }} class">
                                            @csrf
                                            @method ('DELETE')
                                            <button class="text-red-500"><i
                                                    class="fa-solid fa-trash"></i>Delete</button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                        <form action="/generate-pdf">
                                            <button class="text-green-500"><i class="fa-solid fa-download"></i>Export As
                                                Pdf</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($jobseekerlistings) == 0)
                                <tr class="text-lg align-items-center border-gray-300">
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg align-items-center">
                                        <p class="text-lg">No Listing Found</p>
                                    </td>
                                </tr>
                            @endif
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
