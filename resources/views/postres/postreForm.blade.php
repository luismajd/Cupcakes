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
                    @isset($postre)
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-form">Editar postre</span>
                        </h2>
                        {!! Form::model($postre, ['route' => ['postre.update', $postre->id], 'method' => 'PATCH']) !!}
                    @else
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-form">Añadir postre</span>
                        </h2>
                        {!! Form::open(['route' => 'postre.store']) !!}
                    @endisset
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group row">
                            {!! Form::label('nombre', 'Nombre del postre', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('nombre', isset($postre) ? $postre->nombre : null, ['class' => 'form-control', 'id' => 'nombre']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('descripcion', isset($postre) ? $postre->descripcion : null, ['class' => 'form-control', 'id' => 'descripcion', 'rows' => '5']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('precio', 'Precio $', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::number('precio', isset($postre) ? $postre->precio : null, ['class' => 'form-control', 'id' => 'precio', 'rows' => '5']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('imagen', 'Imagen', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('imagen', isset($postre) ? $postre->imagen : null, ['class' => 'form-control', 'id' => 'imagen']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __(isset($postre) ? 'Actualizar postre' : 'Registrar postre') }}
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
