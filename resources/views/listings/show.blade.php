<x-layout>
    @include('partials._search')

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6 rounded-full"
                    src="{{ $listing['logo'] ? asset('storage/' . $listing['logo']) : asset('/images/no-image.png') }}"
                    alt="" />
                <h3 class="text-2xl mb-2">{{ $listing['title'] }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing['name'] }}</div>
                <x-listing-tags :listing_data="$listing" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing['location'] }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $listing['description'] }}
                        </p>

                        <a href="{{ $listing['email'] }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Employer</a>

                        <a href="{{ $listing['website'] }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-globe"></i> Visit
                            Website</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- @if ($listing['user_id'] == auth()->user()->id)
            <div class="flex bg-white text-white mt-5 py-2  justify-center rounded-xl align-center space-x-6">
                <a class=" text-black" href="/listings/{{ $listing['id'] }}/edit" target="_self" class=""><i
                        class="fa-solid fa-edit"></i>
                    Edit</a>
                <form method="POST" action="/listings/{{ $listing['id'] }} class">
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
