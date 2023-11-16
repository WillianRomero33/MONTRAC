@extends('layouts.app', ['pageSlug' => 'origen'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h4 class="card-title">Origenes</h4>
          </div>
          <div class="col-4 text-right">
            <a href="{{ route('origins.create') }}" class="btn btn-fill btn-round btn-primary">Nuevo Origen</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table tablesorter " id="Placa">
          <thead class=" text-primary">
            <tr>
              <th class="col-1">#</th>
              <th class="col-5">Empresa</th>
              <th class="col-4">País</th>
              <th class="col-1">Editar</th>
              <th class="col-1">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($origins as $origin)
              <tr>
                <td> {{ $origin->id }} </td>
                <td> {{ $origin->companies->empresa }} </td>
                <td> {{ $origin->countries->pais }} </td>
                <td>
                  <a href="{{ route('origins.edit', $origin->id) }}" class="btn btn-success btn-icon">
                    <i class="tim-icons icon-pencil"></i>
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