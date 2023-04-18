<x-layout>
    @include('partials._search'),

    @if (count($jobseekerlistings) > 0)
    @foreach ($jobseekerlistings as $listing)
        <x-jobseekerlisting-card :jobseekerlisting='$listing' />
    @endforeach
@else
    <div class="content-center">
        <div class="flex">
            <p class="text-xl ">No JobSeekerListings Found </p>
        </div>
    </div>
@endif
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    <div class="mt-6 p-4 justify-between ">{{ $jobseekerlistings->links() }}</div>
</x-layout>