@extends(front_view_path('layouts.dashboard'))

<x-administrable::seotags :force="true" :title="$request->title" />

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-6">
            @if($request->isConfirmed())
            <div class="alert alert-success">
                Cette requete a été approuvée.  <br>
                <p>
                    {{ $request->getAcceptMotif() }}
                </p>
            </div>
            @elseif($request->isRejected())
            <div class="alert alert-danger">
                Cette requete a ete rejetée. <br>
                <p>
                    {{ $request->getRejectMotif() }}
                </p>
            </div>
            @endif
            <p class="pb-2"><b>Titre: </b>{{ $request->title }}</p>
            <p class="pb-2"><b>Contenu: </b>{{ $request->content }}</p>
            <p class="pb-2"><b>Infos demandeur: </b>{{ $request->defender }}</p>
            <p class="pb-2"><b>Montant: </b>{{ format_price($request->amount) }}</p>
            <p class="pb-2">
                <b>Statut: </b>
                @if($request->status)
                {{ $request->status }}
                @else
                @if($request->online)
                pas brouillon
                @else
                brouillon
                @endif
                @endif
            </p>
            <p class="pb-2">
                <b>Réquérant: </b>
                <a href="">
                    {{ $request->applicant->name }}
                </a>
            </p>
            <p class="pb-2">
                <b>Defendeur: </b>
                <a href="">
                    {{ $request->defender_user->name }}
                </a>
            </p>
            <p class="pb-2"><b>Date émission: </b>{{ format_date($request->created_at) }}</p>
            {{-- add fields here --}}
            <hr>
            @if($request->getReferes()?->isNotEmpty())
            <h5 >Infos sur le meeting</h5>
            <h6>Lien:</h6>
            <p >
                <a href="{{ $request->getMeetingLink() }}">{{ $request->getMeetingLink() }}</a>
            </p>
            <h6>Description:</h6>
            <p >
               {{ $request->getMeetingDescription() }}
            </p>
            @endif
        </div>
        <div class="col-md-6">
            <h5>Documents justificatifs</h5>
            <br>
            <ul class="list-group">
                @foreach ($request->getAttachedFiles() as $file)
                <li class="list-group-item">
                    <a href="{{ $file->getUrl() }}" target="_blank">
                        {{ $file->file_name }}
                    </a>
                </li>

                @endforeach
            </ul>
            <hr>
            <h5>Arbitres assignés</h5>
            <ul class="list-group">
                @foreach ($request->getReferes() ?? [] as $refere)
                <li class="list-group-item">
                    <a href="{{ route('back.refere.show', $refere) }}" target="_blank">
                       {{ $refere->name }} - {{ $refere->job }}
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
@endsection
