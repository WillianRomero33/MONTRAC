@extends('layouts.app', ['pageSlug' => 'transporte'])
@php
    $tipos = array ('Furgón','Contenedor','Camión','Pick-up')
@endphp
@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('transports.store') }}">
      @csrf
      
      <div class="form-group">
        <label for="placa">Placa</label>
        <input class="form-control" name="placa" id="placa">
      </div>

      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" name="tipo" id="tipo">
          <option value="" selected disabled hidden>Elige el tipo del Medio de Transporte</option>
          @foreach ($tipos as $tipo)
            <option class="text-primary">{{$tipo}}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
@endsection