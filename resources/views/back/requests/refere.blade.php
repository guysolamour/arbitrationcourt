@extends(back_view_path('layouts.base'))



@section('title','Ajout requests')


@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                   <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('back.request.index') }}">Requests</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Ajout</a></li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Assignation arbitres</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
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

                            </div>
                            <div class="col-md-12">
                                <hr>
                                @php
                                    $selected_referes = $request->getReferes();
                                @endphp
                                <form action="{{ route('back.request.refere.store', $request) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="referes">Choisir des arbitres</label>
                                        <select class="custom-select select2" name="referes[]" id="referes" multiple>
                                            @foreach ($referes as $refere)
                                            <option value="{{ $refere->id }}" @if($selected_referes?->contains('id', $refere->id)) selected @endif>{{ $refere->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Lien de la réunion visio conférence</label>
                                      <input type="text" name="meeting_link" id="meeting_link" class="form-control" value="{{ $request->getMeetingLink() }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Lien de la réunion visio conférence</label>
                                      <textarea  name="meeting_description" id="meeting_description" class="form-control" required>{{ $request->getMeetingDescription() }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<x-administrable::select2 />
@endsection
