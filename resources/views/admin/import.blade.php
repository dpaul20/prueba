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
                    <h2 class="title">Importador</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('admin/import') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import_file" class="form-control">
                            <br>
                            <button class="btn btn-success">Import File</button>
                        </form>
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
