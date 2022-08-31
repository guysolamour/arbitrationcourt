@extends(front_view_path('layouts.dashboard'))

<x-administrable::seotags :force="true" :title="$request->title" />

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <h1>Edition: {{ $request->title }} </h1>
            <br>

            {!! form_start($form) !!}
            {!! form_rest($form) !!}

            @dropzone([
                'model'     => $form->getModel(),
                'collection' => 'attachments',
                'label'      => 'Documents justificatifs',
                'message'    => 'Tous les documents nécessaire à l\'arbitrage',
                'uploadMultiple' => true,
            ])

            <button class="btn btn-primary btn-block" type="submit">Enregistrer la demande</button>
            {!! form_end($form) !!}
        </div>
    </div>
</div>
@endsection
