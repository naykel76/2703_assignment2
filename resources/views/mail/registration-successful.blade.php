@component('mail::message')
# Welcome

{{ $user->name}}

You have successfully registered

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
