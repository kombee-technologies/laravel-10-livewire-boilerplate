<x-mail::message>
Hi,

We just need to verify your email address before you can access {{ config('app.name') }}.

Your OTP is : <b>{{ $otp }}</b>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
