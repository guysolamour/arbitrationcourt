@component('mail::message')
Bonjour {{ $request->applicant->name }},

Votre requete initiée le {{ format_date($request->created_at) }} à l'encontre de {{ $request->defender_user->name }} a été approuvée.


Motif: <br>
{{ $request->getAcceptMotif() }}

<br>
Vous serez contactés par mail lorsque les arbitres auront été désignés.

Merci,<br>
{{ config('app.name') }}
@endcomponent
