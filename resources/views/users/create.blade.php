@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('user.store') }}">
      @csrf
      
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
        <label for="password">Contraseña inicial</label>
        <input type="password" class="form-control" name="password" id="password" required>
        @include('alerts.feedback', ['field' => 'password'])
      </div>

      <div class="form-group">
        <label for="role">Rol</label>
        <select class="form-control" name="role" id="role" required>
          <option value="" selected disabled hidden>Elige el rol a asignar</option>
          @foreach ($roles as $role)
            <option class="text-primary">{{$role}}</option>
          @endforeach
        </select> 
      </div>

      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
@endsection