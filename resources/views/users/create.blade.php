@extends('layouts.layout')
@section('title', 'Agregar usuario')
@section('content')
  <h1>Agregar usuario </h1>
  <hr>
  <form action=" {{ url('/users/crear') }} " method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Pedro Perez" value="{{old('name')}}">

        @if($errors->has('name'))
          <small class="text-danger">{{ $errors->first('name') }}</small>
        @endif

    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" placeholder="pedro@example.com" value="{{old('email')}}">

        @if($errors->has('email'))
          <small class="text-danger">{{ $errors->first('email') }}</small>
        @endif

    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input class="form-control" type="password" id="password" name="password" placeholder="Mayor a 6 caracteres">

        @if($errors->has('password'))
          <small class="text-danger">{{ $errors->first('password') }}</small>
        @endif

    </div>
    <button type="submit" class="btn btn-primary">
      Crear usuario
    </button>
  </form>
  <a href=" {{ route('users.index') }} ">Regresar a la lista de usuarios</a>
@endsection