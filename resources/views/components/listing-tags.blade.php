@props(['listing_data'])

@php
    $skills_array = $listing_data['skills'] ? json_decode($listing_data['skills']) : [];
    $currentRoute = url()->current();
    
    $colors = ['bg-red-200', 'bg-blue-200', 'bg-green-200', 'bg-yellow-200', 'bg-purple-200'];
    $colorIndex = 0;
    
    shuffle($skills_array);
    $randomSkills = array_slice($skills_array, 0, 7);
@endphp

<ul class="flex">
    @foreach ($randomSkills as $skill)
        @if ($skill != '')
            @php
                $colorClass = $colors[$colorIndex % count($colors)];
                $colorIndex++;
            @endphp

            @if (str_contains(strtolower($currentRoute), 'employers'))
                <li
                    class="inline-block {{ $colorClass }} rounded-full px-3 mt-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <a href="/employers/?skills={{ $skill }}">{{ $skill }}</a>
                </li>
            @endif

            @if (str_contains(strtolower($currentRoute), 'job-seekers'))
                <li
                    class="inline-block {{ $colorClass }} rounded-full px-3 py-1 mt-3 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <a href="/job-seekers/?skills={{ $skill }}">{{ $skill }}</a>
                </li>
            @endif
        @endif
    @endforeach
</ul>
