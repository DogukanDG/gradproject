@props(['jobseekerlisting'])

{{-- <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg mt-5">
        <div class="relative">
            <div class="absolute top-0 right-0 bg-blue-600 text-white px-2 py-1 rounded-bl-lg"> Engineer </div>
        </div>
        <div class="px-6 py-4">
            <h3 class="text-xl font-semibold text-gray-800"><a
                    href="/job-seekers/{{ $jobseekerlisting['id'] }}">{{ $jobseekerlisting['name'] }}
                    {{ $jobseekerlisting['last_name'] }}</a>
            </h3>
            <p class="text-gray-600 text-lg mb-2"> {{ $jobseekerlisting['title'] }} </p>
            <div class="flex flex-wrap">
                <x-listing-tags :listing_data=$jobseekerlisting></x-listing-tags>
            </div>
            <div class="mt-4">
                <h4 class="text-gray-800 font-semibold mb-2">Description</h4>
                <p class="text-gray-700 text-base leading-relaxed h-40">{{ $jobseekerlisting['description'] }}</p>
            </div>
        </div>

    </div>
</div> --}}
<div class="p-6 ml-3 mr-6 mt-5 border border-gray-200 rounded-lg shadow-lg bg-gray-100">
    <div class="relative">
        <div class="absolute top-0 right-0 font-bold text-gray-900 px-2 py-1"> <i class="fa-solid fa-location-dot"></i>
            {{ $jobseekerlisting['location'] }} </div>
    </div>
    <a href="/job-seekers/{{ $jobseekerlisting['id'] }}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $jobseekerlisting['name'] }}
            {{ $jobseekerlisting['last_name'] }}</h5>
    </a>
    <h4 class="mb-2 text-xl font-medium text-gray-700">{{ $jobseekerlisting['title'] }}</h4>
    <x-listing-tags :listing_data="$jobseekerlisting" />
    <div class="mt-3">
        <p class="mb-3 text-gray-700">
            {{ Illuminate\Support\Str::limit($jobseekerlisting['description'], $limit = 75, $end = '...') }}
        </p>
        <div class="relative">
            <p class="absolute bottom-0 right-0 text-gray-600 mt-2">
                <i class="fa-solid fa-clock-dot"></i>
                Posted {{ \Carbon\Carbon::parse($jobseekerlisting['created_at'])->diffForHumans() }}
            </p>
            <a href="/job-seekers/{{ $jobseekerlisting['id'] }}"
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
