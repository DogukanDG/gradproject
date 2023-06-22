<x-layout>
    @include('partials._search')
    <div class="mx-10">

        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-sky-300 from-sky-700">Job Seeker Listings</span>
        </h1>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here Are All the
            Job Seeker Listings That Is Currently Active.
        </p>
    </div>
    @if (!empty($sortedlisting))
        <div class="grid grid-cols-2">
            @foreach ($sortedlisting as $match)
                @if ($match['listing']->is_active)
                    <x-jobseekerlisting-card :jobseekerlisting="$match['listing']" />
                @endif
            @endforeach
        </div>
    @elseif (!empty($jobseekerlistings))
        <div class="grid grid-cols-2">
            @foreach ($jobseekerlistings as $listing)
                @if ($listing->is_active)
                    <x-jobseekerlisting-card :jobseekerlisting="$listing" />
                @endif
            @endforeach
        </div>
    @elseif(!empty($userlistings))
        <div>User Listings</div>
    @else
        <div class="content-center">
            <div class="flex">
                <p class="text-xl">No JobSeekerListings Found</p>
            </div>
        </div>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        <div class="mt-6 p-4 justify-between">
            {{-- @if ($sortedlisting)
            @elseif(!empty($jobseekerlistings))
                {{ $jobseekerlistings->links() }}
            @endif --}}
        </div>
    </div>
</x-layout>
