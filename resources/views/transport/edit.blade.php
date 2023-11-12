@extends('layouts.app', ['pageSlug' => 'transporte'])
@php
    $tipos = array ('Furgón','Contenedor','Camión','Pick-up')
@endphp
@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('transports.update', $medio->id) }}">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="placa">Placa</label>
        <input class="form-control" name="placa" id="placa" value="{{$medio->placa}}">
      </div>

      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" name="tipo" id="tipo">
          @foreach ($tipos as $tipo)
            <option class="text-primary" @if ($medio->tipo == $tipo) selected @endif>{{$tipo}}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
@endsection