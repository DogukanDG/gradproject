@props(['listing_data'])

@php
    
    $skills_array = $listing_data['skills'] ? json_decode($listing_data['skills']) : [];
    
@endphp


<ul class="flex">
    @foreach ($skills_array as $tag)
        <li class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
