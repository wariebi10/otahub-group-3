<?php
  session_start();
  require "database-connect.php";

    //Select students from database
    $sql = "SELECT * FROM community ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $user_id = $_SESSION['id'];

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
    <title>Post</title>
</head>
<body style=" background-color: lightgray;">   
     <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            
        <?php foreach($profile as $pro){ ?>
            <a href="upload/<?php echo $pro['image']; ?>"><img src="upload/<?php echo $pro['image']; ?>" alt="" width="50" height="50" class="rounded-circle shadow"></a><br>
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

    <div class="container w-70 mt-4" style=" background-color: rgb(202, 229, 238); lightblue; border-radius: 4rem;">
        <h1 style="text-align: center;">POST PAGE</h1>
        <div>
            <form action="process-profile.php" method="post" enctype="multipart/form-data">
                <div class="container mt-4">
                    <div class="row mt-4">
                        <div class="main mt-4">
                            <?php foreach($messages as $message){ ?>
                                <a href="upload/<?php echo $message['image']; ?>"><img src="upload/<?php echo $message['image']; ?>" alt=""  width="50" height="50" class="rounded-circle shadow"></a>
                                <strong><?php echo $message['fullname']; ?></strong>:
                                <?php echo $message['text']; ?><br><br>
                                <a href="upload/<?php echo $message['files']; ?>"><img src="upload/<?php echo $message['files']; ?>"  class="img-fluid w-25" style="border-radius: 15%;"></a><br><br>
                                <?php echo $message['date']?><br><br>
                            <?php } ?>
                        </div>
                        <a href="community.php"  class="btn btn-danger btn-sm shadow mb-4">back</a>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</body>
</html>