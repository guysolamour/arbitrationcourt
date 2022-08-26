@extends(front_view_path('layouts.dashboard'))

<x-administrable::seotags :force="true" title="Quiz" />

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <Quiz
                :questions="{{ $questions }}"
            />
        </div>
    </div>
</div>
@endsection
