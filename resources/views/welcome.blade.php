<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       {{-- @vite(['./resources/css/app.css' , './resources/js/app.js']) --}}
    </head>
    <body>
       <h1>مرحبا بكم </h1>
       <a href="{{ '/welcome' . $oneTimeToken }}">الدخول مرة واحدة</a>
    </body>
</html>
