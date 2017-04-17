@component('mail::header')
    Reset Password
@component('mail::message')

    # Restore Password!
    Restore Password Application:

    {{$email}}
    {{$token}}

@endcomponent