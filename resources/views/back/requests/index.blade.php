@extends(back_view_path('layouts.base'))



@section('title','Requests')




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
                        <li class="breadcrumb-item active" aria-current="page">Requests</li>
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
                        <a href="{{ route('back.request.create') }}" class="btn  btn-primary"> <i
                                class="fa fa-plus"></i> Ajouter</a>



                        <a href="#" class="btn btn-danger d-none" data-model="\App\Models\Request" id="delete-all">
                            <i class="fa fa-trash"></i> Tous supprimer</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-vcenter card-table" id='list'>
                        <thead>
                            <th>
                                <div class="checkbox-fade fade-in-success ">
                                    <label for="check-all">
                                        <input type="checkbox" value=""  id="check-all">
                                        <span class="cr">
                                            <i class="cr-icon ik ik-check txt-success"></i>
                                        </span>
                                    </label>
                                </div>
                            </th>
                            <th>#</th>

                <th>Titre</th>
                <th>Contenu</th>
                <th>Montant</th>
                <th>Status</th>
                <th>Réquérant</th>
                <th>Defendeur</th>
                <th>Date création</th>

                            {{-- add fields here --}}
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr class="tr-shadow">
                                        <td>
                    <div class="checkbox-fade fade-in-success ">
                        <label for="check-{{ $request->id }}">
                            <input type="checkbox" data-check data-id="{{ $request->id }}"  id="check-{{ $request->id }}">
                            <span class="cr">
                                <i class="cr-icon ik ik-check txt-success"></i>
                            </span>
                            {{-- <span>Default</span> --}}
                        </label>
                    </div>
                </td>

                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($request->title, 50) }}</td>
                <td>{{ Str::limit($request->content, 50) }}</td>
                <td>{{ format_price($request->amount) }}</td>
                <td>
                    @if($request->status)
                    {{ $request->status }}
                @else
                    @if($request->online)
                    pas brouillon
                    @else
                    brouillon
                    @endif
                @endif
                </td>
                <td>
                    @if($request->applicant)
                   <a href="{{ route('back.user.show',$request->applicant ) }}" class="badge badge-secondary p-2">
                        {{ $request->applicant->name }}
                    </a>
                    @endif
                </td>
                <td>
                    @if($request->defender_user)
                    <a href="{{ route('back.user.show', $request->defender_user ) }}" class="badge badge-primary p-2">
                        {{ $request->defender_user->name }}
                    </a>
                    @endif
                </td>
                <td>{{ format_date($request->created_at) }}</td>
                                {{-- add values here --}}
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('back.request.show', $request) }}" class="btn btn-primary"
                                             title="Afficher"><i class="fas fa-eye"></i></a>

                                        {{-- index clone link --}}
                                          <a href="{{ route('back.request.edit', $request) }}" class="btn btn-info"
                                            title="Editer"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('back.request.delete', $request) }}" data-method="delete"
                                            data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?" class="btn btn-danger"
                                            title="Supprimer"><i class="fas fa-trash"></i></a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>

<x-administrable::datatable />
@deleteAll

@endsection
