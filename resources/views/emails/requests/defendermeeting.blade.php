@component('mail::message')
Bonjour,

Nous vous faisons suivre  la date de la programmation de l'audience dans l'affaire
{{ $request->applicant->name }} contre {{ $request->defender_user->name }} ainsi que le lien d'accès
à la salle virtuelle.

Lien zoom: {{ $request->getMeetingLink() }} <br>
<small>Vous pouvez partager ce lien à tous ceux qui sont susceptibles d'y participer.</small>


Détails <br>
{{ $request->getMeetingDescription() }}

@component('mail::button', ['url' => $request->getMeetingLink()])
Accéder à la salle
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
