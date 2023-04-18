@props(['listing_data'])

@php
    
    $tags_array = explode(',', $listing_data['tags']);
    
@endphp


<ul class="flex">
    @foreach ($tags_array as $tag)
        <li class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
