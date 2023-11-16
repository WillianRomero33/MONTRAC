@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('user.update', $user->id) }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
      </div>

      <div class="form-group">
        <label for="role">Rol</label>
        <select class="form-control" name="role" id="role" required>
          @foreach ($roles as $role)
            <option class="text-primary" @if ($role == $user->roles()->pluck('name')[0]) selected @endif >{{$role}}</option>
          @endforeach
        </select> 
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
@endsection