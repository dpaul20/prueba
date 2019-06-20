@extends('layouts.app')

@section('title', 'Categoría ampliado')

@section('body-clase', 'profile-page')

@section('content')
	<div class="header header-filter" style="background-image: url('{{ asset('/images/examples/city.jpg') }}');"></div>
	<div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-circle img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title">{{ $category->name }}</h3>

                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{ $category->description }}</p>
                </div>

				<div class="team text-center">
                    <div class="row" style="display: flex;flex-wrap: wrap;">
                        @foreach ($products as $product)
                            <div class="col-md-4" style="margin-bottom: 5em; display: flex;flex-direction: column;">
                                <div class="team-player">
                                    <a href="{{ url('products/'.$product->id) }}">
                                        <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="img-raised img-circle">
                                        <p class="description">{{$product->description}}</p>
                                    </a>
  
                                </div>
                            </div>
                        @endforeach   
                    </div>
                    <div class="row">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </div>
	</div>
	@include('includes.footer')
@endsection
@if (session('notificacion'))
    <div class="alert alert-success" role="alert">
        {{ session('notificacion') }}
    </div>
@endif