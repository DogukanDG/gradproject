
@if (count($listings) > 0)
<h1>{{$heading}}</h1>
@foreach ($listings as $listing)
    <h2><a href="/listing/{{$listing['id']}}">{{$listing['title']}}</a></h2>
    <p>{{$listing['description']}}</p>

@endforeach
@else
    <p>No Listings Found </p>
@endif
