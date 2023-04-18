<x-layout>
    @include('partials._search')

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                {{-- MAYBE WE CAN ADD PROFİLE PİCTURES LATER --}}
                {{-- <img class="w-48 mr-6 mb-6 rounded-full"
                    src="{{ $jobseekerlisting['logo'] ? asset('storage/' . jobseeker['logo']) : asset('/images/no-image.png') }}"
                    alt="" /> --}}
                <h3 class="text-2xl mb-2">{{ $jobseekerlisting['title'] }}</h3>
                <div class="text-xl font-bold mb-4">{{ $jobseekerlisting['name'] }}</div>
                <x-listing-tags :listing_data="$jobseekerlisting" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $jobseekerlisting['location'] }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $jobseekerlisting['description'] }}
                        </p>

                        <a href="mailto:{{ $jobseekerlisting['email'] }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Job Seeker</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-7xl mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">{{ $jobseekerlisting->title }}</h2>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Name:</span>
                        <span>{{ $jobseekerlisting->name }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Tags:</span>
                        <span>{{ $jobseekerlisting->tags }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Education:</span>
                        <span>{{ $jobseekerlisting->education }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Experience:</span>
                        <span>{{ $jobseekerlisting->experience }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Location:</span>
                        <span>{{ $jobseekerlisting->location }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Email:</span>
                        <span>{{ $jobseekerlisting->email }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">CV:</span>
                        <a href="{{ $jobseekerlisting->cv }}" class="text-blue-600">{{ $jobseekerlisting->cv }}</a>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Desired Roles:</span>
                        <span>{{ $jobseekerlisting->desired_roles }}</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-600">Description:</span>
                        <p class="mt-2">{{ $jobseekerlisting->description }}</p>
                    </div>
                </div>
                <a class=" text-black" href="/job-seekers/{{ $jobseekerlisting['id'] }}/edit" target="_self"
                    class=""><i class="fa-solid fa-edit"></i>
                    Edit</a>
                <form method="POST" action="/job-seekers/{{ $jobseekerlisting['id'] }}">
                    @csrf
                    @method ('DELETE')
                    <button type='submit' class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                </form>
            </div>
        </div>
        {{-- @if (jobseeker['user_id'] == auth()->user()->id)
            <div class="flex bg-white text-white mt-5 py-2  justify-center rounded-xl align-center space-x-6">
                <a class=" text-black" href="/listings/{{ jobseeker['id'] }}/edit" target="_self" class=""><i
                        class="fa-solid fa-edit"></i>
                    Edit</a>
                <form method="POST" action="/listings/{{ jobseeker['id'] }} class">
                    @csrf
                    @method ('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                </form>
            </div>
        @else
            <div></div>
        @endif --}}
    </div>
</x-layout>
