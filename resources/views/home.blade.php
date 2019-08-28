@extends('layouts.app')

@section('title', 'Dashboard')

@section('body-clase', 'product-page')

@section('content')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('{{ asset('img/examples/city.jpg') }}');">

        </div>

        <div class="main main-raised">
            <div class="container">

                <div class="section">
                    <h2 class="title text-center">Dashboard</h2>
                   
                </div>
                @if (session('notificacion'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notificacion') }}
                    </div>
                @endif

                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li>
                        <a href="#shopping" role="tab" data-toggle="tab">
                            <i class="material-icons">shopping_cart</i>
                            Carrito de compras
                        </a>
                    </li>
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>
                <hr>
                <p>tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos</p>
                @if (auth()->user()->cart->details->count()>0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Imagen</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripción</th>
                                <th class="text-right" >Cantidad</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right" >SubTotal</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->cart->details as $details)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ $details->product->featured_image_url }}" height="50"></td>
                                    <td>
                                        <a href="{{ url('products/'.$details->product->id) }}" target="_blank">{{ $details->product->name }}</a>
                                    </td>
                                    <td>{{ $details->product->description }}</td>
                                    <td class="text-right">{{ $details->quantity }}</td>
                                    <td class="text-right">${{ $details->product->price }}</td>
                                    <td class="text-right">${{ $details->product->price * $details->quantity }}</td>
                                    <td class="td-actions text-right">        
                                        <form method="POST" action="{{ asset('/cart') }}" style="display: inline-block;"> 
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="cart_detail_id" value="{{ $details->id }}">
                                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                        <strong>El importe total a pagar es: </strong>{{ auth()->user()->cart->total }}
                    </p>
                @endif
                <div class="text-center">
                    @if (auth()->user()->cart->details->count()>0)
                        <form method="POST" action="{{ url('/order') }}">
                            @csrf
                            
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons">done</i> Realizar pedido
                            </button>
                        </form>
                    @endif
    
                    
                </div>
                
            </div>

        </div>

        @include('includes.footer')
    </div>
@endsection


