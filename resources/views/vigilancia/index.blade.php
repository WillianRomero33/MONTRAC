@extends('layouts.app', ['pageSlug' => 'vigilancia'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Vigilancia</h4>
            </div>
            <div class="card-body">
                <table class="table tablesorter">
                    <thead class=" text-primary">
                        <tr>
                            <th>Placa</th>
                            <th>Tipo</th>
                            <th>País</th>
                            <th>Empresa</th>
                            <th>Confirmar Ingreso</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $item->transports->placa }}</td>
                            <td>{{ $item->transports->tipo }}</td>
                            <td>{{ $item->origins->countries->pais }}</td>
                            <td>{{ $item->origins->companies->empresa}}</td>
                            <td>
                                @if($item->ingreso_zf === null)
                                <form action="{{ route('vigilancia.confirmarIngreso', $item->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Confirmar Ingreso</button>
                                </form>
                                @elseif($item->ingreso_zf !== null)
                                {{$item->ingreso_zf}}
                                @else
                                Sin información de estado de transporte
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
