@extends('layouts.app', ['pageSlug' => 'bodega']) 

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>
      </div>
      <div class="card-body">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>Placa</th>
                <th>Tipo</th>
                <th>Pais</th>
                <th>Empresa</th>
                <th>Estado</th>
                <th>Selectivo</th>
                <th>Submit</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transport_status as $status)
              <tr>
                <td>{{$status->transports->placa}}</td>
                <td>{{$status->transports->tipo}}</td>
                <td> {{$status->origins->countries->pais}} </td>
                <td> {{$status->origins->companies->empresa}} </td>
                <td> {{$status->estado}}</td>
                <td> @if ($status->selectivo === 1) {{"Verde"}} 
                  @elseif ($status->selectivo === 2) {{"Amarillo"}}
                  @elseif ($status->selectivo === 3) {{"Rojo"}}
                  @else {{"N/A"}} @endif
                </td>
                <td>
                  @if ($status->fin_revision!=NULL && $status->descarga===NULL)
                    <a href="{{ route('bodega.submit', $status->id) }}" class="btn btn-success btn-icon">
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
                      <a href="{{ route('bodega.edit', $status->transports->id) }}" class="dropdown-item text-info">Editar</a>
                      {{-- !-- Button trigger modal --> --}}
                      <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$status->transports->id}}">
                        Ver Detalles
                    </button>
                    </div>
                  </div>
                </td>

              </tr>
              {{-- <-- Modal --> --}}
              <div class="modal fade" id="exampleModal{{$status->transports->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <p>{{'Inicio de tránsito: '.$status->inicio_transito}}</p>
                          <p>{{'Ingreso a Zona Franca: '.$status->ingreso_zf}}</p>
                          <p>{{'Fin de tránsito: '.$status->fin_transito}}</p>
                          <p>{{'Inicio de selectivo: '.$status->inicio_selectivo}}</p>
                          <p>{{'Fin de selectivo: '.$status->fin_selectivo}}</p>
                          <p>{{'Fin de revisión: '.$status->fin_revision}}</p>
                          <p>{{'Descarga: '.$status->descarga}}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $transport_status->links() }}
      </div>
    </div>
  </div>
</div>

@endsection
