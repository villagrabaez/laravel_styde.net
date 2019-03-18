@extends('layouts.layout')
@section('title', 'Pagina no encontrada')
@section('content')
  <h1>404 | Pagina no encontrada.</h1>
  <a href=" {{ route('users.index') }} ">Volver a lista de usuarios</a>
@endsection