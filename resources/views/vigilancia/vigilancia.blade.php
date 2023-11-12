<!-- C:\laragon\www\MONTRAC\resources\views\vigilancia\vigilancia.blade.php -->

@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Transport Information</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class=" text-primary">
                            <tr>
                                <th>Placa</th>
                                <th>País</th>
                                <th>Empresa</th>
                                <th>Tipo</th>
                                <th>Confirmar Ingreso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $item->placa }}</td>
                                <td>{{ optional(optional($item->originDetail)->country)->pais ?? 'N/A' }}</td>
                                <td>{{ optional($item->company)->Empresa ?? 'N/A' }}</td>
                                <td>{{ $item->tipo }}</td>
                                <td>
                                    @if($item->transportStatus && $item->transportStatus->inicio_transito === null)
                                    <form action="{{ route('vigilancia.confirmarIngreso', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Confirmar Ingreso</button>
                                    </form>
                                    @elseif($item->transportStatus && $item->transportStatus->inicio_transito !== null)
                                    Ya confirmado
                                    @else
                                    Sin información de estado de transporte
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
