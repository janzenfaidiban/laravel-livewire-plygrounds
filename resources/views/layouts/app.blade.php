<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucfirst(Request::segment(2) . ' - ' ?? '') }}Laravel Playground</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .icon {
        padding-left: 25px;
        padding-right: 25px;
        margin-left: 100px;
        background: url("https://icons.veryicon.com/png/o/application/full-of-interest/search-555.png") no-repeat left;
        background-size: 15px;
        background-position-x: 5px;
        /* color: #b0b0b0 */
        }
    </style>
</head>
<body>

    <nav class="container">
        <div class="row">
            <div class="col p-5">
                <a href="{{ route('countries') }}" class="btn @if(Request::segment(2) == 'countries') btn-dark @else btn-outline-dark @endif">🗺️ Countries </a>
                <a href="{{ route('cities') }}" class="btn @if(Request::segment(2) == 'cities') btn-dark @else btn-outline-dark @endif">🏙️ Cities</a>
                <a href="{{ route('shops') }}" class="btn @if(Request::segment(2) == 'shops') btn-dark @else btn-outline-dark @endif">🛍️ Shops</a>
            </div>
        </div>
    </nav>

    <main>

        <div class="container">
            <div class="row">
                <div class="col px-5 pt-5">

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
