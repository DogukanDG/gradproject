@props(['listing'])

{{-- <div class="flex">
        <img class="hidden w-48 mr-6 md:block rounded-full"
            src="{{ $listing['logo'] ? asset('storage/' . $listing['logo']) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing['id'] }}">{{ $listing['title'] }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing['name'] }}</div>

            <x-listing-tags :listing_data="$listing" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing['location'] }}
            </div>
        </div>
    </div> --}}


<div class="p-6 ml-3 mr-6 mt-5 border border-gray-200 rounded-lg shadow-lg bg-gray-100">
    <div class="relative">
        <div class="absolute top-0 right-0 font-bold text-gray-900 px-2 py-1">
            <i class="fa-solid fa-location-dot"></i>
            {{ $listing['location'] }}
        </div>
    </div>

    <div class="flex items-center">
        <a href="/listings/{{ $listing['id'] }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                <img class="w-10 h-10 mr-2 rounded-full inline-block"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="" />
                {{ $listing['name'] }}
            </h5>
        </a>
    </div>
    <h4 class="mb-2 text-xl font-medium text-gray-700">{{ $listing['title'] }}</h4>
    <x-listing-tags :listing_data="$listing" />
    <div class="mt-3">
        <p class="mb-3 text-gray-700">
            {{ Illuminate\Support\Str::limit($listing['description'], $limit = 75, $end = '...') }}
        </p>
        </p>
        <div class="relative">
            <p class="absolute bottom-0 right-0 text-gray-600 mt-2">
                <i class="fa-solid fa-clock"></i>
                Posted {{ \Carbon\Carbon::parse($listing['created_at'])->diffForHumans() }}
            </p>
            <a href="/listings/{{ $listing['id'] }}"
                class="inline-flex items-center px-4 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                Learn more

                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns=http://www.w3.org/2000/svg>

                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>

                </svg>

            </a>
        </div>

    </div>
</div>
