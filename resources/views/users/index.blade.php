@extends('layouts.app', [$pageSlug = 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h4 class="card-title">Usuarios</h4>
            </div>
            <div class="col-4 text-right">
              <a href="{{ route('user.create') }}" class="btn btn-fill btn-round btn-primary mb-3">Nuevo Usuario</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table tablesorter " id="Placa">
            <thead class=" text-primary">
              <tr>
                <th class="col-3">Usuario</th>
                <th class="col-3">Email</th>
                <th class="col-3">Rol</th>
                <th class="col-1">Editar</th>
                <th class="col-1">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td> {{ $user->name}} </td>
                  <td> {{ $user->email}} </td>
                  <td> {{ $user->roles()->pluck('name')[0] }} </td>
                  <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-icon">
                      <i class="tim-icons icon-pencil"></i>
                    </a>
                  </td>
                  <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-icon" id="delete">
                        <i class="tim-icons icon-trash-simple"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{$users->render()}}
        </div>
      </div>
    </div>
  </div>
@endsection