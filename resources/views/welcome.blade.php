@extends('layouts.app')

@section('title', 'Bienvenido a '.config('app.name'))
@section('styles')
<style type="text/css">
    .tt-query {
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  }

  .tt-hint {
      color: #999
  }

  .tt-menu {    /* used to be tt-dropdown-menu in older versions */
      width: 422px;
      margin-top: 4px;
      padding: 4px 0;
      background-color: #fff;
      border: 1px solid #ccc;
      border: 1px solid rgba(0, 0, 0, 0.2);
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
      -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
      -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
      box-shadow: 0 5px 10px rgba(0,0,0,.2);
  }

  .tt-suggestion {
      padding: 3px 20px;
      line-height: 24px;
  }

  .tt-suggestion.tt-cursor,.tt-suggestion:hover {
      color: #fff;
      background-color: #0097cf;

  }

  .tt-suggestion p {
      margin: 0;
  }
</style>
@endsection
@section('body-clase', 'landing-page')

@section('content')
<div class="wrapper">
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Bienvenido a {{ config('app.name') }}</h1>
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
                <h2 class="title">Categorías</h2>
                <div class="row">
                    <div class="col-md-4 col" >
                        <form class="form-inline" method="get" action="{{ url('/buscar') }}">
                            <input id="buscar" type="text" name="buscar" placeholder="¿Qué producto buscas?" class="form-control" >
                            <button class="btn btn-primary btn-fab btn-fab-mini btn-round" type="submit">
                                <i class="material-icons">search</i>
                            </button>
                        </form>
                    </div>

                </div>
                
                <div class="team">
                    <div class="row" style="display: flex;flex-wrap: wrap;">
                        @foreach ($categories as $category)
                        <div class="col-md-4" style="margin-bottom: 5em; display: flex;flex-direction: column;">
                            <div class="team-player">
                                <a href="{{ url('categories/'.$category->id) }}">
                                    <img src="{{ $category->featured_image_url }}" alt="{{ $category->name }}" class="img-raised img-circle">
                                    <h4 class="title">{{ $category->name }} <br />
                                    </h4>
                                    <p class="description">{{ $category->description }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach   
                    </div>
                </div>

            </div>


            <div class="section landing-section">
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

            </div>
        </div>

    </div>

    @include('includes.footer')
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // constructs the suggestion engine
        var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '{{ url('/search/json') }}'
        });
        $('#buscar').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },{
            name: 'products',
            source: products
        });
    });
</script>
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

