@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-clase', 'product-page')

@section('content')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center">
                    <h2 class="title">Listado de productos</h2>

                    <div class="team">
                        <div class="row">
                            <div class="row text-right">
                                <a href="{{ asset('admin/import') }}" class="btn btn-primary btn-round">Carga masiva</a>
                            </div>
                            <div class="row text-right">
                                <a href="{{ asset('admin/products/create') }}" class="btn btn-primary btn-round">Nuevo producto</a>
                            </div>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="col-md-2 text-center">Nombre</th>
                                        <th class="col-md-4 text-center">Descripción</th>
                                        <th class="text-center">Categoría</th>
                                        <th class="text-right">Precio</th>
                                        <th class="text-right">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td class="text-center">{{ $producto->id }}</td>
                                            <td>{{ $producto->name }}</td>
                                            <td>{{ $producto->description }}</td>
                                            <td>{{ ($producto->category) ? $producto->category->name : 'General'}}</td>
                                            <td class="text-right">${{ $producto->price }}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ url('products/'.$producto->id) }}" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs" target="_blank">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="{{ asset('admin/products/'.$producto->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ asset('admin/products/'.$producto->id.'/images') }}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                                                    <i class="material-icons">image</i>
                                                </a>
                                                <form method="POST" action="{{ asset('admin/products/'.$producto->id.'/delete') }}" style="display: inline-block;"> 
                                                    @csrf
                                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                            {{ $productos->links() }}
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

