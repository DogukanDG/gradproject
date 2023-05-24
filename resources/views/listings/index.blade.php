<x-layout>
    @include('partials._search')

    @if (!empty($sortedlisting))
        @foreach ($sortedlisting as $match)
            <x-jobseekerlisting-card :jobseekerlisting="$match['listing']" />
        @endforeach
    @elseif (!empty($listings))
        @foreach ($listings as $listing)
            <x-jobseekerlisting-card :jobseekerlisting="$listing" />
        @endforeach
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
            @elseif(!empty($listings))
                {{ $listings->links() }}
            @endif
        </div>
    </div>
</x-layout>
