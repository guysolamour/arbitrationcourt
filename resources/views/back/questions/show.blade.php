@extends(back_view_path('layouts.base'))

@section('title', $question->title)


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
                             <a href="{{ route('back.question.edit', $question) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editer</a>


                             <a href="{{ route('back.question.delete', $question) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?">
                                <i class="fas fa-trash"></i> Supprimer</a>



                        </div>
                    </div>

                    <div class="card-body row">
                        <div class="col-md-8">
                                                
            <p class="pb-2"><b>Titre: </b>{{ $question->title }}</p>
            <p class="pb-2"><b>Uuid: </b>{{ $question->uuid }}</p>
            <p class="pb-2"><b>Answer: </b>{{ $question->answer }}</p>
            <p class="pb-2"><b>En ligne: </b>{{ $question->online ? __('Yes') : __('No') }}</p>
            <p class="pb-2"><b>Date ajout: </b>{{ format_date($question->created_at) }}</p>
                            {{-- add fields here --}}
                        </div>
                        <div class="col-md-4">
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
