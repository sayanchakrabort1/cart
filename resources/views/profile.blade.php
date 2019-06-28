<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="icon" type="image/ico" href="images/logoicon.jpg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap Jquery -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    {{-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}

    <style>
        body{
            background:url('/images/mainpage.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .mvToBot{
            color:white;
            margin-top:5%;
        }
        .flex-r{
            display:flex;
            flex-direction: row;
            flex:1;
        }

        .flex-c{
            display:flex;
            flex-direction: column;
            flex:1;
        }

        .marg{
            margin-top:5%;
        }

        .img{
            margin-top:30%;
            height:300px;
            max-width:300px;
            width:100%;
            border-radius:50%;
            margin-left:90%;
        }

        .maxWidth{
            max-width:300px;
            width:100%;
            height:522px;
        }

        .lilSpace{
            padding-left:5%!important;
        }

    </style>
</head>
<body>


    <div id="app">
        <navbarlog></navbarlog>
         
        {{-- <div class="container">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div> --}}

        @if ($errors->any()){
            <procontent email="{{ $email }}" image="{{ $image }}" fname="{{ $fname }}" lname="{{ $lname }}" city="{{ $city }}" error="{{ "1" }}"></procontent>}
        @else{
            <procontent email="{{ $email }}" image="{{ $image }}" fname="{{ $fname }}" lname="{{ $lname }}" city="{{ $city }}"></procontent>
        }
        @endif

        <div class="mvToBot">
        <foot></foot>
        </div>

   </div>



    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>