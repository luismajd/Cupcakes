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
                            <th>ID</th>
                            <th>Postre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th></th>
                        </tr>
                        @foreach($postres as $postre)
                            <tr>
                                <td>{{ $postre->id }}</td>
                                <td>{{ $postre->nombre }}</td>
                                <td>{{ $postre->descripcion }}</td>
                                <td>{{ '$'.$postre->precio }}</td>
                                <td><img src='{{ asset('img/' . $postre->imagen) }}' height="100" width="100"></td>
                                <td>
                                    <a href="{{ route('postre.unhide', $postre->id) }}" class="btn btn-success btn-sm">Desocultar</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
