@extends('layouts.app', ['pageSlug' => 'aduana'])
{{-- Creacion de un diccionario para imprimir el texto de los selectivos --}}
@php
  $selectText = array(
    0 => "Verde",
    1 => "Amarillo",
    2 => "Rojo",
  )
@endphp
@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('aduanas.update', $transport->id) }}">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="id_medio">Placa</label>
        <input class="form-control" name="id_medio" id="id_medio" value="{{$transport->transports->placa}}" readonly>
      </div>

      <div class="form-group">
        <label for="pais">País</label>
        <input class="form-control" name="pais" id="pais" value="{{$transport->origins->countries->pais}}" readonly>
      </div>

      <div class="form-group">
        <label for="empresa">País</label>
        <input class="form-control" name="empresa" id="empresa" value="{{$transport->origins->companies->empresa}}" readonly>
      </div>

      <div class="form-group">
        <label for="selectivo">Origen</label>
        <select class="form-control" name="selectivo" id="selectivo" required>
          @for ($i = 0; $i <= 2; $i++)
            <option class="text-primary" value="{{ $i }}" @if ($transport->selectivo === $i) selected @endif>{{ $selectText[$i] }}</option>  
          @endfor
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
@endsection