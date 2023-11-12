@extends('layouts.app', ['pageSlug' => 'origen'])

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('origins.update', $origin->id) }}">
      @csrf
      @method('PUT')
      
      <div class="form-group">
        <label for="pais">Pais</label>
        <input class="form-control" type="text" list="paises" name="pais" id="pais" value="{{$origin->countries->pais}}"/>
          <datalist id="paises">
            @foreach ($countries as $country)
              <option>{{$country->pais}}</option>
            @endforeach
          </datalist>
      </div>

      <div class="form-group">
        <label for="empresa">Empresa</label>
        <input class="form-control" type="text" list="empresas" name="empresa" id="empresa" value="{{$origin->companies->empresa}}"/>
          <datalist id="empresas">
            @foreach ($companies as $company)
              <option>{{$company->empresa}}</option>
            @endforeach
          </datalist>
      </div>

      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
@endsection