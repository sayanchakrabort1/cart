<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Electronics Shop</title>
        <link rel="icon" type="image/ico" href="images/logoicon.jpg" />
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- JS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    body{
        padding:0;
        margin:0;
        background:url('/images/background.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

.sizer{
    max-width:500px!important;
    width:100%!important;
    height:300px!important;
    border-radius:10px;
}

.sizer2{
    margin-top:5%;
    background-color:inherit;
}


.flex-r{
  display:flex;
  flex-direction: row;
  flex:1;
}

.flex-c{
  display:flex;
  flex-direction: column;
}

.test{
  background-color:transparent;
  border-radius:8px;
  border:1px skyblue solid; 
  margin-top:4%;
  max-width:500px;
  width:100%;
  margin-left:4%;
}

.test2{
  background-color:transparent;
  border-radius:8px;
  border:1px skyblue solid; 
  margin-top:7%;
  max-width:500px;
  width:100%;
  margin-left:4%;
}

.written{
  max-width:500px;
  width:100%;
  margin-top:7%;
  border-radius:8px;
  border:1px skyblue solid;
  padding:3%; 
}

.data{
  max-width:500px;
  width:100%;
  margin-top:7%;
  border-radius:8px;
  border:1px skyblue solid;
  padding:3%; 
  color:##269054;
  margin-left:4%;
}



/* --------------------------- FLIPPER ---------------------------- */
.flip-card {
  background-color: transparent;
  max-width: 500px;
  height: 300px;
 
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  /* text-align: center; */
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: white;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

/* --------------------------- FLIPPER ---------------------------- */

/* -------------------------------------------------------------- Electronics Shop */

@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
*, *:before, *:after{
  box-sizing:border-box;
}
body{
  font-family: 'Roboto', sans-serif;
    
}
div.foo{
  width: 90%;
  margin: 0 auto;
  text-align: center;
  
}
.letter{
  display: inline-block;
  font-weight: 900;
  font-size: 3em;
  margin: 0.1em;
  position: relative;
  color: #00B4F1;
  transform-style: preserve-3d;
  perspective: 400;
  z-index: 1;
}
.letter:before, .letter:after{
  position:absolute;
  content: attr(data-letter);
  transform-origin: top left;
  top:0;
  left:0;
}
.letter, .letter:before, .letter:after{
  transition: all 0.3s ease-in-out;
}
.letter:before{
  /* color: #fff; */
  color:black!important;
  text-shadow: 
    -1px 0px 1px rgba(255,255,255,.8),
    1px 0px 1px rgba(0,0,0,.8);
  z-index: 3;
  transform:
    rotateX(0deg)
    rotateY(-15deg)
    rotateZ(0deg);
}
.letter:after{
  color: rgba(0,0,0,.11);
  z-index:2;
  transform:
    scale(1.08,1)
    rotateX(0deg)
    rotateY(0deg)
    rotateZ(0deg)
    skew(0deg,1deg);
}
.letter:hover:before{
  color: #fafafa;
  transform:
    rotateX(0deg)
    rotateY(-40deg)
    rotateZ(0deg);
}
.letter:hover:after{
  transform:
    scale(1.08,1)
    rotateX(0deg)
    rotateY(40deg)
    rotateZ(0deg)
    skew(0deg,22deg);
}

/* -------------------------------------------------------------- Electronics Shop */
</style>
 

    </head>
    <body>
       <div id="app">
            <navbar></navbar>
           <div class="container">
           <welcome user="{{ $user }}" prod="{{ $prod }}"></welcome>
            </div>
            <div class="mvToBot">
            <foot></foot>
            </div>
       </div>

       <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
