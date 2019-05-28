@extends('layouts.app')

@section('title', 'Bienvenido a Prueba')

@section('body-clase', 'product-page')

@section('content')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

        </div>

        <div class="main main-raised">
            <div class="container">

                <div class="section">
                    <h2 class="title text-center">Registrar producto</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ asset('admin/products') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del producto</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio</label>
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                 <div class="form-group label-floating">
                                    <label class="control-label">Descripción</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_descripction">{{ old('long_descripction') }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
  
                    </form>
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

