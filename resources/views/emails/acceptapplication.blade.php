<x-mail::message>
    # OFFER INFORMATION

    @php
        $receiverId = $applicationfind->receiver_listing_id;
        $receiver = App\Models\Applications::find($receiverId);
    @endphp

    {{ $receiver }}
    <p class="text-lg">
        The offer that is sent to {{ $receiver->name }} is accepted. Contact the user from
        <span class="font-bold">{{ $receiver->email }}</span>
    </p>


    <x-mail::button :url="'http://127.0.0.1:8000/'">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
