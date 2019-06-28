<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/ico" href="images/logoicon.jpg" />
    {{-- <meta name="csrf-token" content="{{ csrf_field() }}"> --}}
    <title>Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <!-- JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap Jquery -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        body {
            padding: 0;
            margin: 0;
            background: url('/images/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .total {
            border: 1px skyblue solid;
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            margin-top: 2%;
            padding-bottom: 3%;
            border-radius: 8px;
            background-color:white;
        }

        .total:hover{
            box-shadow: 2px 5px skyblue;
        }

        .linker {
            margin-left: 80%;
        }

        .mvToBot{
            margin-top:10%;
        }
    </style>
</head>

<body>
    <div id="app">
        <navbar></navbar>
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="total container">
            <loginpage> </loginpage>
            <a class="linker" href="/register">Click here to Register</a>
        </div>
        <div class="mvToBot">
        <foot></foot>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>