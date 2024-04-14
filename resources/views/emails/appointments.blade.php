<x-mail::message>
# {{ $name }}
:تم حجز موعدك بتاريخ{{ $appointment }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
