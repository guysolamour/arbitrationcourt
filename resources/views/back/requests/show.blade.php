@extends(back_view_path('layouts.base'))

@section('title', $request->title)


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
                                <a href="{{ route('back.request.index') }}">Requetes</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $request->title }}</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Requests</h3>
                        <div class="btn-group float-right">
                            {{-- <a href="{{ route('back.request.edit', $request) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editer</a> --}}


                                <a href="{{ route('back.request.delete', $request) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?">
                                <i class="fas fa-trash"></i> Supprimer</a>



                            </div>
                        </div>

                        <div class="card-body row">
                            <div class="col-md-6">
                                @if($request->isConfirmed())
                                <div class="alert alert-success">
                                    Cette requete a ete approuve. Il ne reste qu'à constituer le tribunal et fixer la date d'audience. <br>
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
                                <div class="btn-group">
                                    @unless($request->isConfirmed())
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-check" aria-hidden="true"></i> Valider</a>
                                    @endunless

                                    @if(!$request->isRejected())
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal"><i class="fa fa-times" aria-hidden="true"></i> Rejeter</a>
                                    @endif
                                    @if($request->isConfirmed())
                                    <a href="{{ route('back.request.refere', $request) }}" class="btn btn-secondary"><i class="fa fa-edit" aria-hidden="true"></i> Assigner des arbitres</a>
                                    @endif
                                </div>
                                <br><br><br>
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

                                <!-- Modal -->
                                @unless($request->isConfirmed())
                                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success">
                                                Confirmation de la requete
                                            </div>
                                            <form action="{{ route('back.request.confirm', $request) }}" id="confirm-form" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="accepted_reason">Raison</label>
                                                    <textarea name="accepted_reason" id="accepted_reason" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" form="confirm-form" class="btn btn-success">Enregistrer</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endunless

                                <!-- Modal -->
                                <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel">Rejet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">
                                                Rejet de la requete
                                            </div>
                                            <form action="{{ route('back.request.reject', $request) }}" id="reject-form" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Raison</label>
                                                    <textarea name="rejected_reason" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" form="reject-form" class="btn btn-success">Enregistrer</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection
