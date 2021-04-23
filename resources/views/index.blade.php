@extends('layouts.app')

@section('title', 'Bienvenido a ' . config('app.name'))

@section('body-clase', 'landing-page')

@section('content')
    <div class="carouselOferta">
        <div class="barraTitulo azul">
            <h1>SOLO POR HOY</h1>
        </div>
        <div id="carouselIndex" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndex" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselIndex" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselIndex" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/images/examples/bg3.jpeg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/examples/bg.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/examples/bg2.jpeg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndex" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndex" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div id="buscador" class="blanco">
        <div class="barraTitulo naranja">
            <h1>BUSCAR PRODUCTO</h1>
        </div>
        <form id="form-buscar" class="align-items-center" method="get" action="{{ url('/buscar') }}">
            <div class="input-group">
                <input id="buscar" type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar..."
                    aria-describedby="button-addon-buscar">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon-buscar"><i
                        class="bi bi-search"></i></button>
            </div>
        </form>
    </div>

    <div id="contactanos" class="container-fluid blanco">
        <h1 class="contactanos mt-1">CONTÁCTANOS</h1>
        <form>
            <div class="form-floating mb-3">
                <input type="text" class="form-control fondo-gris" id="floatingNombre" placeholder="...">
                <label class="texto-input" for="floatingNombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control fondo-gris" id="floatingCorreo" placeholder="...">
                <label class="texto-input" for="floatingCorreo">Correo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control fondo-gris" id="floatingCelular" placeholder="...">
                <label class="texto-input" for="floatingCelular">Celular</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control fondo-gris" placeholder="Dejé su comentario..." id="floatingComentario" style="height: 100px"></textarea>
                <label class="texto-input" for="floatingComentario">Dejé su comentario...</label>
            </div>
            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary naranja border-0">Enviar consulta</button>
            </div>
        </form>
    </div>

    {{-- <div class="section text-center">
                <h2 class="title">Categorías</h2>
                <div class="row">
                    <div class="col-md-4 col">

                    </div>

                </div>

                <div class="team">
                    <div class="row" style="display: flex;flex-wrap: wrap;">
                        @foreach ($categories as $category)
                            <div class="col-md-4" style="margin-bottom: 5em; display: flex;flex-direction: column;">
                                <div class="team-player">
                                    <a href="{{ url('categories/' . $category->id) }}">
                                        <img src="{{ $category->featured_image_url }}" alt="{{ $category->name }}"
                                            class="img-raised img-circle">
                                        <h4 class="title">{{ $category->name }} <br />
                                        </h4>
                                        <p class="description">{{ $category->description }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div> --}}


    {{-- <div class="section landing-section">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">¿Aún no te has registrado?</h2>
                        <h4 class="text-center description">Dejanos tus datos y estaremos en contacto contigo pronto.</h4>
                        <form class="contact-form" method="GET" action="{{ url('/register') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tu nombre</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tu Correo electrónico</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div> --}}




@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/buscador.js') }}"></script>
@endsection
{{-- @if (Route::has('login'))
<div class="top-right links">
    @auth
    <a href="{{ url('/home') }}">Home</a>
    @else
    <a href="{{ route('login') }}">Login</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif
    @endauth
</div>
@endif --}}
