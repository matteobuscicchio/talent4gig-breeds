<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DogApi</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <dogs-component></dogs-component>
        </div>
            
        <!-- collegamento js  per usare componeti -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>