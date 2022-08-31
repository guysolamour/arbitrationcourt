@component('mail::message')
Bonjour {{ $request->applicant->name }},

Votre requete initiée le {{ format_date($request->created_at) }} à l'encontre de {{ $request->defender_user->name }} a été rejetée.


Motif: <br>
{{ $request->getRejectMotif() }}


Merci,<br>
{{ config('app.name') }}
@endcomponent
