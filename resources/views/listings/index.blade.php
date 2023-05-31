<x-layout>
    @include('partials._search')

    @if (!empty($sortedlisting))
        @foreach ($sortedlisting as $match)
            <x-listing-card :listing="$match['listing']" />
        @endforeach
    @elseif (!empty($listings))
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach
    @else
        <div class="content-center">
            <div class="flex">
                <p class="text-xl">Listings Found</p>
            </div>
        </div>
    @endif

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        <div class="mt-6 p-4 justify-between">
            @if ($sortedlisting)
            @elseif(!empty($listings))
                {{ $listings->links() }}
            @endif
        </div>
    </div>
</x-layout>
