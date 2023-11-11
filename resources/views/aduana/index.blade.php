@extends('layouts.app', ['pageSlug' => 'maps'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Aduana</h4>
      </div>
      <div class="card-body">
        <table class="table tablesorter " id="Placa">
          <thead class=" text-primary">
            <tr>
              <th>Placa</th>
              <th>Tipo</th>
              <th>Pais</th>
              <th>Empresa</th>
              <th>Estado</th>
              <th>Finalizar transito</th>
              <th>Selectivo</th>
              <th>Finalizar Selectivo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transports as $transport)
              <tr>
                <td> {{ $transport->transports->placa}} </td>
                <td> {{ $transport->transports->tipo}} </td>
                <td> {{ $transport->origins->countries->pais}} </td>
                <td> {{ $transport->origins->companies->empresa}} </td>
                <td> {{ $transport->estado}} </td>
                <td>
                  @if ($transport->inicio_transito!=NULL && $transport->fin_transito === NULL)
                    <a href="{{ route('aduanas.transito', $transport->id) }}" class="btn btn-success btn-icon">
                      <i class="tim-icons icon-check-2"></i>
                    </a>
                  @endif
                </td>
                <td> @if ($transport->selectivo === 0) {{"Verde"}} 
                    @elseif ($transport->selectivo === 1) {{"Amarillo"}}
                    @elseif ($transport->selectivo === 2) {{"Rojo"}}
                    @else {{"N/A"}} @endif
                </td>
                <td>
                  @if ($transport->inicio_selectivo!==NULL && $transport->selectivo !==NULL && $transport->fin_revision === NULL)
                    <a href="{{ route('aduanas.selectivo', $transport->id) }}" class="btn btn-success btn-icon">
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
                      <a href="{{ route('aduanas.edit', $transport->id) }}" class="dropdown-item text-info">Asignar Selectivo</a>
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
                          <p>{{'Fin de revisión: '.$transport->fin_revision}}</p>
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