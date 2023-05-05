<?php
  session_start();
  require "database-connect.php";

    if(isset($_SESSION['error'])){
      echo $_SESSION['error'];
    }
    unset($_SESSION['error']);

    if(isset($_SESSION['success'])){
      echo $_SESSION['success'];
    }
    unset($_SESSION['success']);

    
  // store our session in a variable
     $user_id = $_SESSION['id'];

  // fetch the record from our database whose user_id is equal to the session
  $sql = "SELECT * FROM profile WHERE user_id =?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  $profile = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // loop through the array to display the individual columns
  foreach($profile as $pro) {
    $pro['user_id'];
    $pro['fullname'];
    $pro['username'];
    $pro['email'];
    $pro['phone'];
    $pro['gender'];
  }


  //EDIT STUDENTS DETAILS
  //Set variables to be first empty to prevent error when app starts. When edit button has been set then reassign values of the variables to that selected from db based on the id passed through the get method so that it can be updated.
  $update = false;
  $fullname = "";
  $username = "";
  $email = "";
  $phone = "";
  $gender = "";
  $session = "";
  $image = "";
  $enter =false;


  if(isset($_GET['edit'])){
      $id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      
      $update = true;
      
      $sql = "SELECT * FROM profile WHERE user_id = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$id]);
      $users = $stmt->fetch(PDO::FETCH_ASSOC);
      $rowCount = $stmt->rowCount();
      
    if(!$rowCount > 0){
      header("Location: profile.php");
    }else{
      $fullname = $users['fullname'];
      $username = $users['username'];
      $email = $users['email'];
      $phone = $users['phone'];
      $gender = $users['gender'];
      $session = $users['session'];
      $image = $users['image'];

    }  
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
  <body class="register" style=" background-color: lightgray;">

    <ul class="nav nav-pills nav-fill">
      <li class="nav-item">

      <?php foreach($profile as $pro){ ?>
        <a href="upload/<?php echo $pro['image']; ?>"><img src="upload/<?php echo $pro['image']; ?>" alt="" width="50" height="50" class="rounded-circle shadow"></a><br>
        <h6><?php echo $pro['fullname']; ?></h6>
      <?php } ?>

      </li>
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="profile.php">set profile</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="community.php">community</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
      </li>
    </ul>

    <div class="container w-50 mt-4" style=" background-color: lightblue;">
      <div class="container-head mt-5" style=" background-color: lightblue;">
        <div class="text mt-4">
          <marquee behavior="slide" direction="up">
          <hr style="text-align: center;">
          <h2 style="text-align: center;">Set <span style="color: blue;">your</span> profile</h2>
          </marquee>
        </div>

        <h6>
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

        <div class="container mt-5" style="background-color: lightblue;">
          <form action="process-profile.php" method="post" enctype="multipart/form-data" >
            <div class="row mt-3">
              <div class="col md-4">
                <marquee behavior="scrol" direction="right">
                <h4 style="text-align: center;"><?php echo $_SESSION['email'] ?></h4>
                </marquee>
                <label for="user_id" hidden>User Id</label>
                <input value="<?php echo $_SESSION['id'];  ?>" type="text" name="user_id" class="form-control" hidden>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col md-4">
                
                <?php if($update == true){ ?>
                  <input class="form-control" type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="Update full name">
                <?php }else{ ?>
                  <input class="form-control" type="text" name="fullname" placeholder="Enter your fullname">
                <?php } ?>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col md-4">
                <?php if($update == true){ ?>
                  <input class="form-control" type="text" name="username" value="<?php echo $username; ?>" placeholder="Update User name">
                <?php }else{ ?>
                  <input class="form-control" type="text" name="username" placeholder="Enter your username">
                <?php } ?>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col md-4">
                
                <?php if($update == true){ ?>
                  <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" hidden>
                <?php }else{ ?>
                  <input class="form-control" type="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION['email'];?>">
                <?php } ?>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col md-4">
                
                <?php if($update == true){ ?>
                    <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Update Phone Number">
                <?php }else{ ?>
                    <input class="form-control" type="text" name="phone" placeholder="Enter your phone number">
                <?php } ?>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col md-4">
                <select class="form-select" name="gender">
                  <!-- If update is true, show gender of student as the first option, else show "Select Gender..." as first option -->
                  <?php if($update == true){ ?>
                    <option value="" selected disabled>Update Gender</option>
                    <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="custume">custume</option>
                  <?php }else{ ?>
                    <option selected disabled value="" class="form-select">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="custume">custume</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col md-4">
                <select class="form-select" name="session">
                  <!-- If update is true, show gender of student as the first option, else show "Select Gender..." as first option -->
                  <?php if($update == true){ ?>
                    <option value="" selected disabled>Update session</option>
                    <option value="<?php echo $session; ?>"><?php echo $session; ?></option>
                    <option value="2020/2021">2020/2021</option>
                    <option value="2021/2022">2021/2022</option>
                    <option value="2022/2023">2022/2023</option>
                  <?php }else{ ?>
                    <option selected disabled value="" class="form-select">Select session/academic year</option>
                    <option value="2020/2021">2020/2021</option>
                    <option value="2021/2022">2021/2022</option>
                    <option value="2022/2023">2022/2023</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col " style="text-align: left;">
                <input type="file" name="image" class="form-control">
              </div>
            </div>
            <div class="row mt-3">
              <div class="form-group">
                <?php if($update==true){ ?>
                  <button type="sumbit" name="update" class="btn btn-warning mt-3">update</button>
                  <a href="profile.php" class="btn btn-danger mt-3">cancle</a>
               <?php } else{?>
                <button type="sumbit" name="enter" class="btn btn-dark mt-3">create profile</button>
                <a href="profile.php?edit=<?php echo$_SESSION['id']; ?>" class="btn btn-danger mt-3">Edit</a>
               <?php }?>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="footer mt-4 w-80" style="background-color: gray;  color: white;">
      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div>
        <div class="row">
          <div class="col-6 mb-4 mb-md-0">
            <h3 id="contact">Contact Us</h3>
            <div class="footer-social">
              <a href="mailto:admissions@thebackhomeproject.org"><span class="icon-envelope"><img src="image/icon.png"></span></a>
              <p>admissions@thebackhomeproject.org</p>
            </div>
          </div>
          <div class="col-6 mb-4 mb-md-0">
            <h3>School</h3>
            <ul class="list-unstyled">
              <li><p class="copyright">Otukpo Code Academy
                <br/>Otukpo, Benue State, Nigeria
                <br/>Copyright &copy; <span id="copyright-year"></span> All rights reserved Otukpo Code Academy</small></p></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>