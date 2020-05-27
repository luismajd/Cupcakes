@extends('layouts.tema')

@section('content')

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-expanded font-weight-bold d-lg-none" href="#">Navegación</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('postre.index') }}">Postres</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('pedido.index') }}">Pedido</a>
                </li>
                @if(\Gate::allows('administrador'))
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-expanded" href="{{ route('user.index') }}">Usuarios
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<section class="page-section form">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="form-inner text-center rounded">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Teléfono</th>
                            <th>Clase</th>
                            @if(\Gate::allows('administrador'))
                                <th></th>
                            @endif
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->tel }}</td>
                                <td>{{ $user->clase }}</td>
                                <td>
                                    @if(\Gate::allows('admin root'))
                                        @if($user->id != 1 and $user->clase == 'Admin')
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="sumbit" class="btn btn-danger btn-sm">Eliminar usuario</button>
                                            </form>
                                        @endif
                                    @endif
                                    @if(\Gate::allows('administrador'))
                                        @if($user->clase == 'Cliente')
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="sumbit" class="btn btn-danger btn-sm">Eliminar usuario</button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                        <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Agregar administrador</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
