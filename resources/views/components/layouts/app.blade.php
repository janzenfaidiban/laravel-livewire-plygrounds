<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>SaCode - Livewire Playground</title>
        @vite('resources/css/app.css')
    </head>
    <body>

        <div class="bg-white">

            <div class="relative isolate px-6 pt-14 lg:px-8">
              <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
              </div>

              <nav class="container mx-auto px-4 ">
                <ul class="menu bg-gray-100 lg:menu-horizontal rounded-box">
                    <li class="">
                      <a href="{{ route('livewire.countries') }}" class="hover:bg-gray-50 @if(Request::segment(2) == 'countries') active @endif">
                        <i class="fa-solid fa-flag"></i>
                        Countries
                        <span class="badge badge-sm">{{ $countCountries }}</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('livewire.cities') }}" class="hover:bg-gray-50 @if(Request::segment(2) == 'cities') active @endif">
                        <i class="fa-solid fa-city"></i>
                        Cities
                        <span class="badge badge-sm">{{ $countCities }}</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('livewire.shops') }}" class="hover:bg-gray-50 @if(Request::segment(2) == 'shops') active @endif">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Shops
                        <span class="badge badge-sm">{{ $countShops }}</span>
                      </a>
                    </li>
                    <li x-data>
                      <a href="#" x-on:click="$refs.form.submit()" class="hover:bg-gray-50">
                        <i class="fa-solid fa-unlock"></i>
                          Logout
                      </a>
                        <form class="hidden" x-ref="form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                  </ul>
            </nav>

            <main class="container mx-auto px-4">
                {{ $slot }}
            </main>



<footer class="">
  <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ Carbon\Carbon::now()->format('Y') }} <a href="https://sacode.web.id/" target="_blank" class="hover:underline">SaCode Community</a>.
  </span>
  <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
      <li>
          <a href="https://github.com/janzenfaidiban/laravel-livewire-plygrounds" target="_blank" class="hover:underline me-4 md:me-6">Repository</a>
      </li>
      <li>
          <a href="https://github.com/janzenfaidiban/laravel-livewire-plygrounds/blob/main/README.md" target="_blank" class="hover:underline me-4 md:me-6">README.md</a>
      </li>
      <li>
          <a href="https://github.com/janzenfaidiban/laravel-livewire-plygrounds/graphs/contributors" target="_blank" class="hover:underline me-4 md:me-6">Contributors</a>
      </li>
  </ul>
  </div>
</footer>



              <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
              </div>
            </div>
          </div>



    </body>
</html>
