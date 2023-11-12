<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">
            Import / Export
        </h2>
      </div>
      <table class="table-auto">
        <thead>
          <tr>
            <th class="px-2 py-1">Placa</th>
            <th class="px-2 py-1">Tipo</th>
            <th class="px-2 py-1">Pais</th>
            <th class="px-2 py-1">Empresa</th>
            <th class="px-2 py-1">Estado</th>
            <th class="px-2 py-1">Selectivo</th>
            <th class="px-2 py-1">Fecha fin revision</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transports as $transport)
            <tr>
              <td class="px-2 py-1"> {{ $transport->transports->placa}} </td>
              <td class="px-2 py-1"> {{ $transport->transports->tipo}} </td>
              <td class="px-2 py-1"> {{ $transport->origins->countries->pais}} </td>
              <td class="px-2 py-1"> {{ $transport->origins->companies->empresa}} </td>
              <td class="px-2 py-1"> {{ $transport->estado}} </td>
              <td class="px-2 py-1"> @if ($transport->selectivo === 1) {{"Verde"}} 
                  @elseif ($transport->selectivo === 2) {{"Amarillo"}}
                  @elseif ($transport->selectivo === 3) {{"Rojo"}}
                  @else {{"N/A"}} @endif
              </td>
              <td class="px-2 py-1"> {{$transport->fin_revision}} </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>