@extends(front_view_path('layouts.dashboard'))

<x-administrable::seotags :force="true" title="Arbitres" />

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <h1>Les arbitres</h1>
            <br>

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($referes as $refere)
                    <tr>
                      <th scope="row">
                        <img src="{{ $refere->image }}" alt="" width="30" height="30">
                      </th>
                      <td>{{ $refere->name }}</td>
                      <td>{{ $refere->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>


        </div>
    </div>
</div>
@endsection
