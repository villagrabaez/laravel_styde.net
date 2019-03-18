@extends('layouts.layout')
@section('title', 'Lista de usuarios')

@section('content')
    <h1>Lista de usuarios: </h1>
  <a href=" {{ url('users/nuevo') }} ">
  <button type="button" class="btn btn-success">Agregar nuevo</button></a>
    <hr>
    @if( ! empty( $users ) )
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Operaciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action=" {{ route('users.destroy', $user) }}" method="post">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <a class="btn btn-link" href="{{ route('users.show', ['id' => $user->id]) }}" title="Ver detalle"><i class="fas fa-eye"></i></a>
                      <a class="btn btn-link" href="{{ url("users/{$user->id}/editar") }}" title="Editar registro"><i class="fas fa-edit"></i></a>
                      <button class="btn btn-link" type="submit" title="Eliminar registro">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    @else
      <p>No hay usuarios registrados.</p>
    @endif
@endsection