<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="images/logoicon.jpg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Main Page</title>
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
</head>

<style>
.lilSpace{
    padding-left:5%!important;
}
body{
    background:url('/images/mainpage.png');
    background-repeat: no-repeat;
    background-size: cover;
}
.mvToBot{
    margin-top:17%;
    color:white;
}
.img{
    margin-top:7%;
    max-width:100px;
    height:100px;   
    border-radius:50%;
    margin-left:7%;
}

.imgbox{
    max-width:125px;
    height:125px;
    border:5px white solid;
    margin-left:40%;
}

.common{
    font-weight:bold;
    color:white;
}

.contentArea{
    /* background-color:red; */
    max-width:350px;
    width:100%;
    margin:0 auto;
}

.listSpacer{
    margin-top:3%;
}
</style>
<body>

    <div id="app">
        <navbarlog></navbarlog>
        <maincontent email="{{ $email }}" image="{{ $image }}" count="{{ $count }}"></maincontent>
        {{-- v-bind:array="{{  json_encode($array) }}" --}}
        <div class="mvToBot">
        <foot></foot>
        </div>
   </div>



    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>