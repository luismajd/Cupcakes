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
                    <a class="nav-link text-expanded" href="{{ route('pedido.create') }}">Hacer pedido
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="">Contacto</a>
                </li>
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
                    <span class="section-heading-form">Levanta tu pedido</span>
                    </h2>
                    {!! Form::open(['route' => 'pedido.store']) !!}

                        <div class="form-group row">
                            {!! Form::label('fecha_entrega', 'Fecha de entrega', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::date('fecha_entrega', null, ['class' => 'form-control', 'id' => 'fecha_entrega']) !!}
                            </div>
                        </div>

                        <table class="table">
                            <tr>
                                <th>Postre</th>
                                <th>Descripción</th>
                                <th>Precio $</th>
                                <th>Imagen</th>
                                <th>Agregar</th>
                                <th>Cantidad</th>
                            </tr>
                            @foreach($postres as $postre)
                                <tr>
                                    <td>{{ $postre->nombre }}</td>
                                    <td>{{ $postre->descripcion }}</td>
                                    <td>{!! Form::text('precio[]', $postre->precio, ['class' => 'form-control', 'id' => 'precio', 'readonly']) !!}</td>
                                    <td><img src='{{ asset('img/' . $postre->imagen) }}' height="100" width="100"></td>
                                    <td>
                                        {!! Form::hidden('agregar[]', '0', false, ['class' => 'form-control', 'id' => 'agregar']) !!}
                                        {!! Form::checkbox('agregar[]', '1', false, ['class' => 'form-control', 'id' => 'agregar']) !!}
                                    </td>
                                    <td>{!! Form::number('cantidad[]', null, ['class' => 'form-control', 'id' => 'cantidad', 'min' => '0']) !!}</td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="form-group row">
                            {!! Form::label('comentarios', 'Comentarios', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('comentarios', null, ['class' => 'form-control', 'id' => 'comentarios']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Registrar pedido') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
