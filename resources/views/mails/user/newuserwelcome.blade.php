@component('mail::message')
# Welcome

todosBackend <small>Paolo Dávila</small>.

@component('mail::button', ['url' => 'http://acacha.org/mediawiki/Usuari:Paolo Davila'])
Acacha Wiki
@endcomponent

Salutacions,<br>
{{ config('app.name') }}
@endcomponent
