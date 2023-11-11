@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<a href="{{ route('imports.create') }}" class="btn btn-fill btn-round btn-primary mb-5">Nuevo</a>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Import / Export</h4>
      </div>
      <div class="card-body">
        <table class="table tablesorter " id="Placa">
          <thead class=" text-primary">
            <tr>
              <th>Placa</th>
              <th>Tipo</th>
              <th>Pais</th>
              <th>Empresa</th>
              <th>Selectivo</th>
              <th>Submit</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transports as $transport)
              <tr>
                <td> {{ $transport->transports->placa}} </td>
                <td> {{ $transport->transports->tipo}} </td>
                <td> {{ $transport->origins->countries->pais}} </td>
                <td> {{ $transport->origins->companies->empresa}} </td>
                <td> @if ($transport->selectivo === 0) {{"Verde"}} 
                    @elseif ($transport->selectivo === 1) {{"Amarillo"}}
                    @elseif ($transport->selectivo === 2) {{"Rojo"}}
                    @else {{"N/A"}} @endif
                </td>
                <td>
                  @if ($transport->fin_transito && $transport->inicio_transito === NULL)
                    <a href="{{ route('imports.submit', $transport->id) }}" class="btn btn-success btn-icon">
                      <i class="tim-icons icon-check-2"></i>
                    </a>
                  @endif
                </td>
                
                <td>
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Más
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a href="{{ route('imports.edit', $transport->id) }}" class="dropdown-item text-info">Editar</a>
                      <form action="{{ route('imports.destroy', $transport->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item text-danger" id="delete">Eliminar</button>
                      </form>
                      {{-- !-- Button trigger modal --> --}}
                      <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$transport->id}}">
                        Ver Detalles
                      </button>
                    </div>
                  </div>
                </td>

              </tr>
              {{-- <-- Modal --> --}}
              <div class="modal fade" id="exampleModal{{$transport->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Fechas</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <div class="text-primary">
                          <p>{{'Inicio de tránsito: '.$transport->inicio_transito}}</p>
                          <p>{{'Fin de tránsito: '.$transport->fin_transito}}</p>
                          <p>{{'Inicio de selectivo: '.$transport->inicio_selectivo}}</p>
                          <p>{{'Fin de selectivo: '.$transport->fin_selectivo}}</p>
                          <p>{{'Fin de revisión: '.$transport->fin_revisión}}</p>
                          <p>{{'Descarga: '.$transport->descarga}}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
            @endforeach
          </tbody>
        </table>
        {{$transports->links()}}
      </div>
    </div>
  </div>
</div>
@endsection