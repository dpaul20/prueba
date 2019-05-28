@extends('layouts.app')

@section('title', 'Bienvenido a Prueba')

@section('body-clase', 'landing-page')

@section('content')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido a Pueba</h1>
                        <h4>Realiza tu pedido y te contactaremos para realizar la entrega.</h4>
                        <br />
                        <a href="#" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> ¿Cómo funciona?
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">¿Por qué prueba test?</h2>
                            <h5 class="description">Puedes revisar nuestra relación completa de productos, compra precios y realiza tus pedidos cuando quieras.</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">Atendemos tus dudas</h4>
                                    <p>Atendemos rápidamente cualquier consulta que tengas via chat. No esta solo, sino que simepre estamos atentos a tus inquietudes.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Pagos Seguros</h4>
                                    <p>Todos nuestros pagos son realmente seguros y son confirmados.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Información privada</h4>
                                    <p>Los pedidos que realices solo los conoceras tú a través de tu panel de usuario. NAdie más tiene acceso a tú información.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section text-center">
                    <h2 class="title">Nuestros productos</h2>

                    <div class="team">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="team-player">
    
                                        <img src="{{ !empty($product->productImage()->first()) ? $product->productImage()->first()->image : asset('img/logo.png') }}" alt="{{ $product->name }}" class="img-raised img-circle">
                                        <h4 class="title">{{ $product->name }} <br />
                                            <small class="text-muted">{{ !empty($product->category->name) ? $product->category->name : 'General' }}</small>
                                        </h4>
                                        <p class="description">{{$product->description}}</p>
                                      {{--   <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                                        <a href="#" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a> --}}
                                    </div>
                                </div>
                            @endforeach
                            
                            
                        </div>
                    </div>

                </div>


                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">¿Alguna consulta?</h2>
                            <h4 class="text-center description">Dejanos tus datos y estaremos en contacto contigo pronto.</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tu nombre</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tu Correo electrónico</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Tu mensaje</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Enviar mensaje
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        @include('includes.footer')
    </div>
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

