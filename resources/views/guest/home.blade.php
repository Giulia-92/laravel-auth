<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                     <a href="{{ url('/admin') }}">Home</a> 
                    @else
                    <button class="btn btn-light"><a href="{{ route('login') }}">Login</a></button>

                        @if (Route::has('register'))
                        <button class="btn btn-light"><a href="{{ route('register') }}">Register</a></button>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                
                  <h2 class="text-center">Benvenuto su Boolpress Accedi o Registrati</h2>
                   
                </div>

                
            </div>
        </div>
    </body>
</html>
