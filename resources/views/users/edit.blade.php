@extends('layouts.layout')
@section('title', 'Acualizar usuario')
@section('content')
  <h1>Atualizar usuario #{{ $user->id }}</h1>
  <hr>
  <form action=" {{ url("users/{$user->id}") }} " method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input class="form-control" type="text" id="name" name="name" value="{{old('name', $user->name)}}">

        @if($errors->has('name'))
          <small class="text-danger">{{ $errors->first('name') }}</small>
        @endif

    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="{{old('email', $user->email)}}">

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
      Actualizar usuario
    </button>
  </form>
  <a href=" {{ route('users.index') }} ">Regresar a la lista de usuarios</a>
@endsection