<?php

  session_start();

  require "database-connect.php";


  $user_id = $_SESSION['id'];


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
      $pro['image'];
    }
  
  




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="community.css">
    <title>Community</title>
</head>
<body style=" background-color: lightgray;">
    
    <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        
    <?php foreach($profile as $pro){ ?>
      <div>
      <a href="upload/<?php echo $pro['image']; ?>"><img src="upload/<?php echo $pro['image']; ?>" alt="" width="50" height="50" class="rounded-circle shadow"></a><br>
      <?php echo $pro['fullname']; ?>
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


    <div class="container w-50" style=" background-color: lightblue; border-radius: 1rem;">
        <div class="links row mt-5">

            <div class="welcome" style="text-align: center;">
                <marquee behavior="slide" direction="up"><h3 class="welcome mt-4">Welcome <span style="color: blue">to community</span> page</h3></marquee>
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

            <div class="container"  style=" background-color: lightblue;">
                <form action="process-profile.php" method="post" enctype="multipart/form-data">
                    <input value="<?php echo $_SESSION['id'];  ?>" type="text" name="user_id" class="form-control" hidden>
                    <input type="text"  value="<?php echo $pro['image']; ?>" name="image" class="form-control" hidden>
                    <input type="text"  value="<?php echo $pro['fullname']; ?>" name="fullname" class="form-control" hidden>
                    <textarea name="text" class="form-control custom-control" style="margin-top: 32%; position: sticky;" id="" cols="8" rows="3"></textarea>
                    <input type="file" name="files" class="form-control mt-2" style="margin-lelf: 30%">
                    <button type="submit" name="send" class="btn btn-primary mt-2">send</button>

                

                    <a href="post.php" class="btn btn-danger btn-sm shadow mt-2">view message</a>
                </form>
            </div>
            
        </div>
        


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>