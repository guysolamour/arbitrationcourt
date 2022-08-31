@extends(front_view_path('layouts.dashboard'))

<x-administrable::seotags :force="true" title="Mes requets" />

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <h1>Mes requetes</h1>
            <br>

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $request->title }}</td>
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
                        <a href="{{ route('front.dashboard.request.show', $request) }}" class="btn btn-secondary"><i class="fa fa-eye"></i> Voir</a>
                        <a href="{{ route('front.dashboard.request.edit', $request) }}" class="btn btn-info"><i class="fa fa-edit"></i> Editer</a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>


        </div>
    </div>
</div>
@endsection
