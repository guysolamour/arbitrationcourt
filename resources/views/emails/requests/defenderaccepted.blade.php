@component('mail::message')
Bonjour {{ $request->defender_user->name }}

La requete initiée  par {{ $request->applicant->name }} le {{ format_date($request->created_at) }} a votre encontre
a été acceptée.
.


Motif: <br>
{{ $request->getAcceptMotif() }}

<br>

Vous serez contactés par mail lorsque les arbitres auront été désignés.


Merci,<br>
{{ config('app.name') }}
@endcomponent
