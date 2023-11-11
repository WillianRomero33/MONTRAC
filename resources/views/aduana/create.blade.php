@extends('layouts.app', ['pageSlug' => 'aduana'])

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('imports.store') }}">
      @csrf
      
      <div class="form-group">
        <label for="id_medio">Placa</label>
        <select class="form-control" name="id_medio" id="id_medio">
          @foreach ($medios as $medio)
            <option class="text-primary" value="{{ $medio->id }}">{{ $medio->placa }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="id_origin">Origen</label>
        <select class="form-control" name="id_origin" id="id_origin">
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