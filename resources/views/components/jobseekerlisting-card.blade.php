@props(['jobseekerlisting'])

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    {{-- Second Listing --}}
    <div class="bg-white rounded-lg overflow-hidden shadow-lg mt-5">
        <div class="relative">
            <div class="absolute top-0 right-0 bg-blue-600 text-white px-2 py-1 rounded-bl-lg"> Engineer </div>
        </div>
        <div class="px-6 py-4">
            <h3 class="text-xl font-semibold text-gray-800"><a
                    href="/job-seekers/{{ $jobseekerlisting['id'] }}">{{ $jobseekerlisting['name'] }}</a>
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
        {{-- <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">oh
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-2" src="https://via.placeholder.com/150"
                        alt="Job seeker avatar">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">Job Seeker Name </p>
                        <p class="text-gray-600">Job Title </p>
                    </div>
                </div>
                <a href="#"
                    class="inline-block bg-blue-500 text-white px-3 py-1 rounded-full hover:bg-blue-600">View
                    Profile</a>
            </div>
        </div> --}}
    </div>
</div>
