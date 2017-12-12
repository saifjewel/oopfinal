<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <title>AddressBook</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <style>
  .container{text-align:center;}
  .maincontainer{cursor:pointer;}

     a{
    text-decoration: none;
  }
  a:hover{
    text-decoration: none;
  }
  </style>
 </head>
  <body>
  
   
 
<ul class="nav justify-content-end navbar navbar-dark bg-dark">
<div class="container"> <a href="index.php"><h2 style="color: #fff;">Address Book System</h2></a>
 
    <a  href="#" ></a></h2>
 
  <li class="nav-item">
    <a class="nav-link" href="#"></a>
  </li>
  
  <?php 
     if (isset($_SESSION['login_success'])) { ?>

     <li class="nav-item">
       <a href="contact.php">Show Contact</a>
     </li>
     <li class="nav-item">
       <a  href="logout.php">Logout</a>
     </li> <?php

  }
  else{
    ?>
    <li class="nav-item">
    <a  href="login.php">Login</a>
  </li>
    <?php
  }
   ?>  
  <li class="nav-item">
    <a class="nav-link disabled" href="#"></a>
  </li>
</ul>
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="JPEG imag1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="JPEG imag2.jpg" alt="Second slide">
    </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>