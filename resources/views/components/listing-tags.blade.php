@props(['listing_data'])

@php
    
    $skills_array = $listing_data['skills'] ? json_decode($listing_data['skills']) : [];
    $currentRoute = url()->current();
    
@endphp


<ul class="flex">
    @foreach ($skills_array as $skill)
        @if (str_contains(strtolower($currentRoute), 'employers'))
            <li class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <a href="/employers/?skills={{ $skill }}">{{ $skill }}</a>
            </li>
        @endif
        @if (str_contains(strtolower($currentRoute), 'job-seekers'))
            <li class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <a href="/job-seekers/?skills={{ $skill }}">{{ $skill }}</a>
            </li>
        @endif
    @endforeach
</ul>
