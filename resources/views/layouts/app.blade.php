<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SaCode - Livewire Playground</title>
    @vite('resources/css/app.css')
</head>
<body>

<nav class="container">
    <div class="row">
        <div class="col p-5">
            <a href="{{ route('countries') }}" class="btn @if(Request::segment(2) == 'country') btn-dark @else btn-outline-dark @endif">🗺️ Country </a>
            <a href="{{ route('cities') }}" class="btn @if(Request::segment(2) == 'city') btn-dark @else btn-outline-dark @endif">🏙️ City</a>
            <a href="{{ route('shops') }}" class="btn @if(Request::segment(2) == 'shop') btn-dark @else btn-outline-dark @endif">🛍️ Shop</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-dark"> Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </div>
     
    </div>
</nav>


    <main>
        <div class="container">
            <div class="row">
                <div class="col p-5">

                    {{-- @yield('main') --}}
                    {{ $slot }}

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        
    <script>
        setTimeout(function(){
            $('.alert').slideUp();
        }, 1000);
    </script>

</body>
</html>
