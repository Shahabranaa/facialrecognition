<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lost and Found Missing Persons</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <style>
        body {
            padding-top: 4rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('index') }}">Lost and Found Missing Persons</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create') }}">Submit a Report </a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="container">
        @yield('content')

        <hr>

        <footer>
            Lost and Found Missing Persons
        </footer>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.0.0.js"
            integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo="
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $('#images-btn').click(function () {
        console.log('jysdvjdbdjsbjhdsb');
        $('#images-div').append('<input type="file" accept="image/*" name="images[]" id="images"/><br><br>');
    });
</script>

</body>
</html>