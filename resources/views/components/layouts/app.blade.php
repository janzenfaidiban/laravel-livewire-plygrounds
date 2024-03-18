<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <nav class="container">
            <div class="row">
                <div class="col p-5">
                    <a href="{{ route('country') }}" class="btn @if(Request::segment(1) == 'country') btn-dark @else btn-outline-dark @endif">🗺️ Country </a>
                    <a href="{{ route('city') }}" class="btn @if(Request::segment(1) == 'city') btn-dark @else btn-outline-dark @endif">🏙️ City</a>
                    <a href="{{ route('shop') }}" class="btn @if(Request::segment(1) == 'shop') btn-dark @else btn-outline-dark @endif">🛍️ Shop</a>
                </div>
            </div>
        </nav>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col p-5">

                        {{ $slot }}

                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
