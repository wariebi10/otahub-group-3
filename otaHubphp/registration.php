<?php
session_start();
require "database-connect.php";

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="lil.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>registration</title>
</head>
<body class="register">

  <marquee behavior="slide" direction="right">
    <h6>
      <?php
          date_default_timezone_set("Africa/Lagos");  
          $h = date('G');

          if($h>=00 && $h<12)
          {
              echo "Good morning";
          }
          else if($h>=12 && $h<16)
          {
              echo "Good afternoon";
          }
          else if($h>=16 && $h<11)
          {
              echo "Good evening";
          }
          else
          {
              echo "Good night";
          };

          echo"<br>";
          echo"<br>";

          echo"Date";
          echo date(":F j, Y,");

          echo"<br>";
          echo"<br>";

          echo"Time";
          echo date(":g: i a");
      ?>
    </h6> 
  </marquee>

  <div class="text mt-4">
    <h2>Fill the form to register</h2>
  </div>

  <h6  style="text-align: center; color: red;">

    <?php

      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
      }
      unset($_SESSION['error']);

      if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
      }
      unset($_SESSION['success']);

    ?>

  </h6>

  <div style="text-align: center;">
    <p id="message"></p>
  </div>
  <div class="container mt-5 w-50">
    <form action="process-registration.php" method="post">
      <div class="row mt-3">
        <div class="col md-4">
          <label for="email">Email Address</label>
          <input type="email" name="email" class="form-control" id="email">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col md-4">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password">
          <input type="checkbox" onclick="show()">show Password
        </div>
      </div>
      <div class="row mt-3">
        <div class="col md-4">
          <label for="confirmpassword">Confirm Password</label>
          <input type="password" name="confirm" class="form-control" id="confirm">
          <input type="checkbox" onclick="Show()">show confirm Password
        </div>
      </div>
      <div class="row mt-3">
        <div class="col md-4">
          <button type="submit" name="register" class="btn btn-primary mt-2">Sign Up</button>
           Already registered?<a href="login.php" class="link">Login</a>
        </div>  
      </div>

    </form>
  </div>
  <script src="check.js"></script>
</body>
</html>