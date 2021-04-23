<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.includes.head')

<body>
    <div class="gv-content d-grid gap-1">
        @include('layouts.includes.header')
        @include('layouts.includes.navbar')
        @yield('content')   
        @include('layouts.includes.footer')
    </div>
    
    @include('layouts.includes.js')
</body >
    
</html>