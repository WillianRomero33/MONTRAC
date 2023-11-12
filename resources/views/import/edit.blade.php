@extends('layouts.app', ['pageSlug' => 'import'])

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('imports.update', $transport->id) }}">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="id_medio">Placa</label>
        <select class="form-control" name="id_medio" id="id_medio">
          @foreach ($medios as $medio)
            <option class="text-primary" value="{{ $medio->id }}" @if ($transport->id_transport == $medio->id) selected @endif>{{ $medio->placa }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="id_origin">Origen</label>
        <select class="form-control" name="id_origin" id="id_origin">
          @foreach ($origins as $origin)
            <option class="text-primary" value="{{ $origin->id }}" @if ($transport->id_origindetail == $origin->id) selected @endif>{{$origin->companies->empresa.' / '.$origin->countries->pais}}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
@endsection