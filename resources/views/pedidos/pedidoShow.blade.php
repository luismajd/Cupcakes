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
                        <span class="section-heading-form">Detalle de pedido</span>
                    </h2>
                    <table class="table">
                        <tr>
                            <th>ID Pedido: </th><td>{{ $pedido->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre de cliente: </th><td>{{ $pedido->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono de cliente </th><td>{{ $pedido->user->tel }}</td>
                        </tr>
                        <tr>
                            <th>Email de cliente: </th><td>{{ $pedido->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de entrega: </th><td>{{ $pedido->fecha_entrega }}</td>
                        </tr>
                        <tr>
                            <th>Comentarios del pedido: </th><td>{{ $pedido->comentarios }}</td>
                        </tr>
                    </table>
                    <?php $total = 0 ?>
                    <table class="table">
                        <tr>
                            <th>ID Postre</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th>Imagen</th>
                        </tr>
                        @foreach($pedido->postres as $postre)
                            <?php
                                $importe = $postre->importe;
                                $total += $importe
                            ?>
                            <tr>
                                <td>{{ $postre->id }}</td>
                                <td>{{ $postre->nombre }}</td>
                                <td>{{ '$' . $postre->precio }}</td>
                                <td>{{ $postre->pivot->cantidad }}</td>
                                <td>{{ '$' . $importe }}</td>
                                <td><img src='{{ asset('img/' . $postre->imagen) }}' height="100" width="100"></td>
                            </tr>
                        @endforeach
                    </table>
                    <h2>Total: ${{ $total }}</h2>
                    @if(\Gate::allows('cliente'))
                    <a href="{{ route('archivo.create') }}" class="btn btn-success btn-sm">Adjuntar comprobante de pago</a>
                    <a href="{{ route('archivo.index') }}" class="btn btn-success btn-sm">Ver mis comprobantes de pago</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
