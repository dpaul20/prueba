@extends('layouts.app')

@section('title', 'Imagen del producto')

@section('body-clase', 'product-page')

@section('content')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center">
                    <h2 class="title">Imagen del producto "{{ $product->name }}"</h2>
                    <div class="row" >
                        <div class="col-sm-4">
                            <div class="card">          
                                <div class="card-body" >
                                    <form method="POST" action="{{ asset('admin/products/'.$product->id.'/images') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="photo" required>
                                        <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
                                        <a href="{{ asset('admin/products/') }}" class="btn btn-default btn-round">Regresar</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row" style="display: flex;flex-wrap: wrap;">   
                        <div class="card-deck">
                            @foreach ($images as $image)
                                <div class="col-sm-4" style="margin-bottom: 3em; display: flex;flex-direction: column;">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $image->url }}" alt="$product->name" width="239">
                                        <div class="card-body">
                                             
                                        </div>
                                        <div class="card-footer" style="display: inline-block;">
                                            <form method="POST" action="{{ asset('admin/products/'.$product->id.'/images') }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                                <button class="btn btn-danger">Eliminar imagen</button>

                                                @if ($image->featured)
                                                    <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada">
                                                        <i class="material-icons">favorite</i>
                                                    </button>
                                                @else
                                                    <a href="{{ asset('admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-default btn-fab btn-fab-mini btn-round">
                                                        <i class="material-icons">favorite</i>
                                                    </a>
                                                @endif
                                            </form>    
                                        </div>
                                    </div>
                                </div>
                           @endforeach
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

