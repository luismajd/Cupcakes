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
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('postre.index') }}">Postres
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('pedido.index') }}">Pedido</a>
                </li>
                @if(\Gate::allows('administrador'))
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="{{ route('user.index') }}">Usuarios</a>
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
                            <th>Postre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            @if(\Gate::allows('administrador'))
                                <th></th>
                                <th></th>
                            @endif
                        </tr>
                        @foreach($postres as $postre)
                            <tr>
                                <td>{{ $postre->nombre }}</td>
                                <td>{{ $postre->descripcion }}</td>
                                <td>{{ '$'.$postre->precio }}</td>
                                <td><img src='{{ 'img/' . $postre->imagen }}' height="100" width="100"></td>
                                @if(\Gate::allows('administrador'))
                                <td>
                                    <a href="{{ route('postre.edit', $postre->id) }}" class="btn btn-primary btn-sm">Modificar</a>
                                </td>
                                <td>
                                    <form action="{{ route('postre.destroy', $postre->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="sumbit" class="btn btn-danger btn-sm">Ocultar</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                    @if(\Gate::allows('administrador'))
                        <a href="{{ route('postre.create') }}" class="btn btn-success btn-sm">Añadir un postre</a>
                        <a href="{{ route('postre.hidden') }}" class="btn btn-warning btn-sm">Ver postres ocultos</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
