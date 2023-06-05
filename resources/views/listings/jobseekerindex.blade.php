<x-layout>
    @include('partials._search')

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
    @else
        <div class="content-center">
            <div class="flex">
                <p class="text-xl">No JobSeekerListings Found</p>
            </div>
        </div>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        <div class="mt-6 p-4 justify-between">
            @if ($sortedlisting)
                {{-- Pagination for $sortedlisting --}}
            @elseif(!empty($jobseekerlistings))
                {{ $jobseekerlistings->links() }}
            @endif
        </div>
    </div>
</x-layout>
