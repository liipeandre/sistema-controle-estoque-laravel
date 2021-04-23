<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema - Home</title>

        @include('templates.css')
    </head>
    <body>
        @include('templates.header')

        <div class="container-fluid">
            <div class="row">

                @include('templates.sidebar')

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                </main>
            </div>
        </div>

        @include('templates.js')
    </body>
</html>
