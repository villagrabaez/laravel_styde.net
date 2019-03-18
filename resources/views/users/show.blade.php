@extends('layouts.layout')
@section('title', "Usuario {$user->id}")

@section('content')
  <h1>Usuario: #{{ $user->id }}</h1>
  <hr>
  <p>Nombre del usuario: {{ $user->name }}</p>
  <p>Correo electronico: {{ $user->email }}</p>
  @if($user->profession['title'])
    <p>Profesion: {{ $user->profession['title'] }}</p>
  @endif
  <a href=" {{ route('users.index') }} "><- Volver a lista</a>
@endsection