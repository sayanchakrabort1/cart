<template>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <img src="images/logoicon.jpg" alt="logo" style="height:50px; width: 50px; ">
      <a class="navbar-brand" href="/">Electronics Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <ul class="nav navbar-nav">
        <li><a href="#"> <span class="glyphicon glyphicon-cog"></span> Manage Product</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-ok-circle"></span> Add Product</a></li>
      </ul> -->

       <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign up & Login <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/register">Sign up</a></li>
            <li><a href="/login">Login</a></li>
          </ul>
        </li>
      </ul>
       
      <!-- <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</template>