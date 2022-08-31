@component('mail::message')
Bonjour

Une requete sur le tribunal virtuel a été initié à votre encontre
par {{ $request->applicant->name }}

.

Contenu: <br>
{{ $request->content }}

Vous pouvez cliquer ignorer ce message ou cliquez sur le bouton

pour lancer le processus.

@component('mail::button', ['url' => route('register') . '?request=' . $request->getKey()])
Lancer
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
