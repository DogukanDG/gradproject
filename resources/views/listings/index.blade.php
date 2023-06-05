<x-layout>
    @include('partials._search')
    <div class="mx-10">

        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-sky-300 from-sky-700">Employer Listings</span>
        </h1>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here Are All the
            Employers Listings That Is Currently Active.
        </p>
    </div>

    @if (!empty($sortedlisting))
        <div class="grid grid-cols-2">
            @foreach ($sortedlisting as $match)
                @if ($match->is_active)
                    <x-listing-card :listing="$match['listing']" />
                @endif
            @endforeach
        </div>
    @elseif (!empty($listings))
        <div class="grid grid-cols-2 ">
            @foreach ($listings as $listing)
                @if ($listing->is_active)
                    <x-listing-card :listing="$listing" />
                @endif
            @endforeach
        </div>
    @else
        <div class="content-center">
            <div class="flex">
                <p class="text-xl">Listings Not Found</p>
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
