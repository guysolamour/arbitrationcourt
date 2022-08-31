@component('mail::message')
Bonjour {{ $request->applicant->name }},

L'audience de votre requete initiée le {{ format_date($request->created_at) }} à
l'encontre de {{ $request->defender_user->name }} a été programée.


Lien: <br>
{{ $request->getMeetingLink() }}
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
