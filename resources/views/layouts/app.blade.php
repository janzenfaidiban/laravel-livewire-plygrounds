<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucfirst(Request::segment(2) . ' - ' ?? '') }}Laravel Playground</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <nav class="container">
        <div class="row">
            <div class="col p-5">
                <a href="{{ route('country') }}" class="btn @if(Request::segment(2) == 'country') btn-dark @else btn-outline-dark @endif">🗺️ Country </a>
                <a href="{{ route('city') }}" class="btn @if(Request::segment(2) == 'city') btn-dark @else btn-outline-dark @endif">🏙️ City</a>
                <a href="{{ route('shop') }}" class="btn @if(Request::segment(2) == 'shop') btn-dark @else btn-outline-dark @endif">🛍️ Shop</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <div class="col p-5">

                    @yield('main')

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
