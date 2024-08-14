<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @viteReactRefresh
        @vite(['resources/js/app.jsx'])
    </head>
    <body class="antialiased">

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-screen-md mx-auto p-6 lg:p-8 sm:w-3/5	">
                <div id="app"></div>
            </div>

            

        </div>

        
    </body>
</html>