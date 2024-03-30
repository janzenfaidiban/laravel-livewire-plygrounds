<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <title>Laravel Playground</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <nav class="container lg:max-w-[1320px]">
            <div class="row">
                <div class="col px-5 pt-5">
                    <a href="{{ route('livewire.countries') }}" class="btn @if(Request::segment(2) == 'countries') btn-dark @else btn-outline-dark @endif">🗺️ Crounties </a>
                    <a href="{{ route('livewire.cities') }}" class="btn @if(Request::segment(2) == 'cities') btn-dark @else btn-outline-dark @endif">🏙️ Cities</a>
                    <a href="{{ route('livewire.shops') }}" class="btn @if(Request::segment(2) == 'shops') btn-dark @else btn-outline-dark @endif">🛍️ Shops</a>
                </div>
            </div>
        </nav>

        <main>
            <div class="container lg:max-w-[1320px]">
                <div class="row">
                    <div class="col p-5">

                        {{ $slot }}

                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
