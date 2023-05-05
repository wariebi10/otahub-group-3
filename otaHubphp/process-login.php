<?php

if (isset($_POST["login"])){
    session_start();
    require "database-connect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$email, $password]);
    $user = $statement->fetch(PDO::FETCH_ASSOC); 


    if($user){
        $_SESSION['success'] = "Login success";
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['id'];
        header("location: dashboard.php");
    } else{
        $_SESSION["error"] = "Login Failed";
        header("location: login.php");
    }

}

?>