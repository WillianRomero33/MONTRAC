@extends('layouts.app', ['pageSlug' => 'origen'])

@section('content')
<div class="row">
  <a href="{{ route('origins.create') }}" class="btn btn-fill btn-round btn-primary mb-3">Nuevo Origen</a>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Origenes</h4>
      </div>
      <div class="card-body">
        <table class="table tablesorter " id="Placa">
          <thead class=" text-primary">
            <tr>
              <th>Empresa</th>
              <th>País</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($origins as $origin)
              <tr>
                <td> {{ $origin->companies->empresa}} </td>
                <td> {{ $origin->countries->pais}} </td>
                <td>
                  <a href="{{ route('origins.edit', $origin->id) }}" class="btn btn-success btn-icon">
                    <i class="tim-icons icon-check-2"></i>
                  </a>
                </td>
                <td>
                  <form action="{{ route('origins.destroy', $origin->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-icon" id="delete">
                      <i class="tim-icons icon-trash-simple"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$origins->links()}}
      </div>
    </div>
  </div>
</div>
@endsection