<?php
session_start();

require "database-connect.php";

  $email ='';
  $password ='';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login portal</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="login">

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
    <h2>Login Portal</h2>
  </div>

  <h6 style="text-align: center; color: red;">

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

  <div class="container mt-5 w-50" style="box-shadow: 0, 0 rgba(0, 0, 0.7);" >
    <div class="texts mt-4">
      <h3>Insert your email and password to login</h3>
    </div>
    <hr style="color: yellow;">
    <div class="form">
      <form action="process-login.php" method="post">
        <div class="row mt-3">
          <div class="col md-4">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Email Address" class="form-control">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col md-4">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control" id="password">
            <input type="checkbox" onclick="show()">show Password
          </div>
        </div>
          <div class="row mt-3">
            <div class="col md-4">
              <button type="submit" name="login" class="btn btn-dark sm-shadow mt-3">Login</button>
              Don't have an account?<a href="registration.php" class="link">Sign Up</a>
            </div>
          </div>
      </form>
    </div>
  </div>
  <script src="check.js"></script>
</body>
</html>