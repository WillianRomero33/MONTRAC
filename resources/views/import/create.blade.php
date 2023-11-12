@extends('layouts.app', ['pageSlug' => 'import'])

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('imports.store') }}">
      @csrf
      
      <div class="form-group">
        <label for="id_medio">Placa</label>
        <select class="form-control" name="id_medio" id="id_medio">
          <option value="" selected disabled hidden>Elige la Placa del Medio de Transporte</option>
          @foreach ($medios as $medio)
            <option class="text-primary" value="{{ $medio->id }}">{{ $medio->placa }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="id_origin">Empresa / País</label>
        <select class="form-control" name="id_origin" id="id_origin">
          <option value="" selected disabled hidden>Elige el origen del Medio de Transporte</option>
          @foreach ($origins as $origin)
            <option class="text-primary" value="{{ $origin->id }}">{{$origin->companies->empresa.' / '.$origin->countries->pais}}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
@endsection