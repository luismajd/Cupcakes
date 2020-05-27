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
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('home') }}">Inicio
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="{{ route('postre.index') }}">Postres</a>
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

<section class="page-section clearfix">
    <div class="container">
        <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/img1.png" alt="">
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                <h2 class="section-heading mb-4">
                    <span class="section-heading-lower">Una mordida, es un dulce beso</span>
                </h2>
                <p class="mb-3">Un pastel suave, un cupcake esponjoso, una galleta rica y colorida, el panqué favorito de la abuela, el mejor acompañamiento para un rico café… ¡queremos ser lo que se te antoje!
                </p>
            </div>
        </div>
    </div>
</section>

<section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="cta-inner text-center rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-lower">El valor de hacer lo que amamos</span>
                    </h2>
                     <p class="mb-0">Nuestra misión es crear en tu paladar la satisfacción de haber comido el mejor postre que pueda existir. Para ello, estamos seguros de que hay una serie de pasos que no pueden faltar en nuestras recetas:

                        <br>
                        1. Crear el postre más rico para la ocasión solicitada,
                        <br>
                        2. Incluir los ingredientes principales, las aportaciones del equipo que darán un toque delicioso,
                        <br>
                        3. Adaptar los postres al cambio, ¡innovar!, ¡crecer!, ¡ir por más!
                        <br>
                        4. Cocinar las nuevas ideas, dando siempre lo mejor para satisfacer a los paladares más exigentes,
                        <br>
                        5. Compartir con quienes amamos, nuestros amigos, familia y uno mismo,
                        <br>
                        6. Disfrutar en cada bocado, el amor.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
