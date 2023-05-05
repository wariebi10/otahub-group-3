<?php
  session_start();

  require "database-connect.php";

  if(!isset($_SESSION['email'])){
      header("Location: login.php");
      exit();

  }



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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
  <body class="dashboard"  style="background-color: lightblue;">

    <ul class="nav nav-pills nav-fill">
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

    <form action="process-profile.php" method="post" enctype="multipart/form-data">
      <?php foreach($profile as $pro){ ?>
        <div class="container mt-4">profile picture <br>
        <a href="upload/<?php echo $pro['image']; ?>"><img src="upload/<?php echo $pro['image']; ?>" alt="" width="50" height="50" class="rounded-circle shadow"></a><br>
        <?php echo $pro['fullname']; ?>
      <?php } ?>
    </form>

    <div class="container">
      <div class="text mt-3">
          <h1 style="text-align: center;">DASHBOARD</h1>
      </div>
      <div class="links row mt-5">

      </div>
      <hr style="text-align: center;">
      <h2 style="text-align: center; color: black;">Welcome <?php echo $_SESSION['email']; ?> To your dash board</h2>
    </div>
    <div class="container">
      <div class="row ">
        <div class="col-md-6">
          <img src="image/ota2.png" class="img-fluid h-100">
        </div>
        <div class="col-md-6">
          <img src="image/ota3.png" class="img-fluid h-100">
        </div> 
      </div>
      <div class="row">
        <div class="col md-6">
          <img src="image/ota5.jpg" class="img-fluid h-100">
        </div>
        <div class="col md-6">
          <img src="image/ota4.jpg"  class="img-fluid h-100">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>