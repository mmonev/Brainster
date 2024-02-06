@component('mail::message')
# Introduction

This mail is sent for your verification.
User {{ $user->name }}
Email: {{ $user->email }}

@component('mail::button', ['url' => $url])
Validate
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent