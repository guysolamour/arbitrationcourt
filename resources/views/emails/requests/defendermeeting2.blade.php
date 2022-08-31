@component('mail::message')
Bonjour {{ $request->defender_user->name }}

L'audience de la requete initiée  par {{ $request->applicant->name }} le {{ format_date($request->created_at) }} a votre encontre
a été programée.
.

Lien: <br>
{{ $request->getMeetingLink() }} <br>
Vous pouvez partager ce lien à tous ceux qui sont susceptibles d'y participer.

Détails: <br>
{{ $request->getMeetingDescription() }}


Arbitres
<ol>
    @foreach ($request->getReferes() as $refere)
    <li>{{ $refere->name }}</li>
    @endforeach
</ol>



@component('mail::button', ['url' => $request->getMeetingLink()])
Accéder à la salle
@endcomponent


Merci,<br>
{{ config('app.name') }}
@endcomponent
