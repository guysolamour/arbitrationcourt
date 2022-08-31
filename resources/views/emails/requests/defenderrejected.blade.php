@component('mail::message')
Bonjour {{ $request->defender_user->name }}

La requete initiée  par {{ $request->applicant->name }} le {{ format_date($request->created_at) }} a votre encontre
a été rejetée.
.


Motif: <br>
{{ $request->getRejectMotif() }}


Merci,<br>
{{ config('app.name') }}
@endcomponent
