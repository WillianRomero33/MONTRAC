@extends('layouts.app', ['pageSlug' => 'transporte'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h4 class="card-title">Medios de Transporte</h4>
          </div>
          <div class="col-4 text-right">
            <a href="{{ route('transports.create') }}" class="btn btn-fill btn-round btn-primary mb-3">Nuevo Medio Transporte</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table tablesorter " id="Placa">
          <thead class=" text-primary">
            <tr>
              <th class="col-1">#</th>
              <th class="col-4">Placa</th>
              <th class="col-5">Tipo</th>
              <th class="col-1">Editar</th>
              <th class="col-1">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($medios as $medio)
              <tr>
                <td> {{ $medio->id}} </td>
                <td> {{ $medio->placa}} </td>
                <td> {{ $medio->tipo}} </td>
                <td>
                  <a href="{{ route('transports.edit', $medio->id) }}" class="btn btn-success btn-icon">
                    <i class="tim-icons icon-pencil"></i>
                  </a>
                </td>
                <td>
                  <form action="{{ route('transports.destroy', $medio->id) }}" method="POST" class="inline">
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
        {{$medios->render()}}
      </div>
    </div>
  </div>
</div>
@endsection