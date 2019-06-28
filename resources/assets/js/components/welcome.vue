<template>


<div class="container">

<div class="foo">
<span class="letter" data-letter="E">E</span>
<span class="letter" data-letter="L">L</span>
<span class="letter" data-letter="E">E</span>
<span class="letter" data-letter="C">C</span>
<span class="letter" data-letter="T">T</span>
<span class="letter" data-letter="R">R</span>
<span class="letter" data-letter="O">O</span>
<span class="letter" data-letter="N">N</span>
<span class="letter" data-letter="I">I</span>
<span class="letter" data-letter="C">C</span>
<span class="letter" data-letter="S">S</span>
<span class="letter" data-letter=""></span>
<span class="letter" data-letter="S">S</span>
<span class="letter" data-letter="H">H</span>
<span class="letter" data-letter="O">O</span>
<span class="letter" data-letter="P">P</span>
</div>
  <div class="flex-r">
    <div id="myCarousel" class="carousel slide sizer" style="margin-top:4%; border-radius:8px;" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      
      <!-- Wrapper for slides -->
      <div class="carousel-inner sizer" style=" border-radius:8px;">
        <div class="item active col">
          <img
            src="/images/phn2.jpg" alt="pixel" style="width:100%; border-radius:8px;" >
        </div>

        <div class="item col">
          <img src="/images/phn3.jpg" alt="Oneplus" style="width:100%;border-radius:8px;">
        </div>

        <div class="item col">
          <img
            src="/images/phn1.png"
            alt="iphone" style="width:100%; border-radius:8px;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="test">
      <div class="flip-card " style=" border-radius:8px;">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="/images/sell.jpg" alt="why sell with us" style="width:500px;height:300px; border-radius:8px;">
          </div>
          <div class="flip-card-back " style=" border-radius:8px;">
            <h1><span class="glyphicon glyphicon-hand-right"></span><span style="margin-left:10%;">Efficient Support </span></h1>
            <h1><span class="glyphicon glyphicon-hand-right"></span><span style="margin-left:10%;">Proper Listing</span></h1>
            <h1><span class="glyphicon glyphicon-hand-right"></span><span style="margin-left:10%;">Best User Experience</span></h1> 
            <h1><span class="glyphicon glyphicon-hand-right"></span><span style="margin-left:10%;">24 x 7 Up Time!</span></h1> 
        </div>
        </div>
      </div>
    </div>
  </div>

    <div class="flex-r">
    <div class="mt written" style="color: #484b4c;">
      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
      type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
      remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
      Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
      of Lorem Ipsum.
    </div>
      <div class="test2">
        <div class="flip-card " style=" border-radius:8px;">
          <div class="flip-card-inner">
            <div class="flip-card-front">
            <img src="/images/number.png" alt="numbers" style="width:500px;height:300px; border-radius:8px;">
            </div>
            <div class="flip-card-back " style=" border-radius:8px;">
            <h1 style="margin-top:20%; margin-left:10%;">Number of Sellers: {{ user }}</h1>
            <h1 style="margin-left:10%;">Number of Products: {{ prod }}</h1>
          </div>
        </div>
      </div>
    </div>
    
    </div>
  </div>

  

    <!-- <div class="data">
      <h1 style="margin-top:10%;">Number of Sellers: {{ user }}</h1>
      <h1>Number of Products: {{ prod }}</h1>
    </div> -->



</template>

<script>

    export default {

        mounted() {
            console.log('Component mounted.')
        },

        data() {
        },

        props: ['prod' , 'user'],

        methods: {

            
        }

    }

</script>