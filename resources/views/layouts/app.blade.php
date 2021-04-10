<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.includes.head')

<body>
    <div class="gv-content d-grid gap-1">
        @include('layouts.includes.header')
    @include('layouts.includes.navbar')

    <div class="wrapper">
        @yield('content')   
    </div>
    @include('layouts.includes.footer')
    </div>
    
    @include('layouts.includes.js')
</body >
    
</html>