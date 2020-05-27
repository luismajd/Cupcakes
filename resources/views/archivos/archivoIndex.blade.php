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
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('pedido.index') }}">Pedido
                        <span class="sr-only">(current)</span>
                    </a>
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
                    <h2 class="section-heading mb-4">
                    <span class="section-heading-form">Mis comprobantes de pago</span>
                    </h2>
                    <table class="table">
                        <tr>
                          <th>Archivo</th>
                          <th>Tamaño</th>
                          <th colspan="2">Acciones</th>
                        </tr>

                        @foreach($archivos as $archivo)
                          <tr>
                            <td>{{ $archivo->nombre_original }}</td>
                            <td>{{ $archivo->tamaño . ' kB' }}</td>
                            <td>
                              <a href="{{ route('archivo.show', $archivo->id) }}" class="btn btn-sm btn-success">Descargar</a>
                            </td>
                            <td>
                              <!-- Formulario para eliminar archivo -->
                              {!! Form::open(['route' => ['archivo.delete', $archivo->id]]) !!}
                              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                              {!! Form::close() !!}
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
