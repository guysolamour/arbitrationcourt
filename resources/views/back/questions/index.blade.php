@extends(back_view_path('layouts.base'))



@section('title','Questions')




@section('content')


<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    {{-- breadcrumb --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Questions</h3>
                        <div class="btn-group float-right">
                            <a href="{{ route('back.question.create') }}" class="btn  btn-primary"> <i
                                class="fa fa-plus"></i> Ajouter</a>



                                <a href="#" class="btn btn-danger d-none" data-model="\App\Models\Question" id="delete-all">
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
                                        <th>Réponse</th>
                                        <th>En ligne</th>
                                        <th>Date création</th>

                                        {{-- add fields here --}}
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $question)
                                        <tr class="tr-shadow">
                                            <td>
                                                <div class="checkbox-fade fade-in-success ">
                                                    <label for="check-{{ $question->id }}">
                                                        <input type="checkbox" data-check data-id="{{ $question->id }}"  id="check-{{ $question->id }}">
                                                        <span class="cr">
                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                        </span>
                                                        {{-- <span>Default</span> --}}
                                                    </label>
                                                </div>
                                            </td>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Str::limit($question->title, 50) }}</td>
                                            <td>{{ Str::limit(html_entity_decode(strip_tags($question->answer, 50))) }}</td>
                                            <td>{{ $question->online ? __('Yes')  : __('No') }}</td>
                                            <td>{{ format_date($question->created_at) }}</td>
                                            {{-- add values here --}}
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('back.question.show', $question) }}" class="btn btn-primary"
                                                    title="Afficher"><i class="fas fa-eye"></i></a>

                                                    {{-- index clone link --}}
                                                    <a href="{{ route('back.question.edit', $question) }}" class="btn btn-info"
                                                    title="Editer"><i class="fas fa-edit"></i></a>

                                                    <a href="{{ route('back.question.delete', $question) }}" data-method="delete"
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
