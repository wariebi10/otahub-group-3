<?php
    
    if (isset($_POST["register"])){
        session_start();
        require "database-connect.php";

        $email = ($_POST["email"]);

        $password = $_POST['password'];
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);

        $confirm = $_POST['confirm'];
    
        if(empty($email) || empty($password) || empty($confirm)){
            $_SESSION["error"] = "All fields are required";
            header("location: registration.php");
            exit();
        }

        if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 5) {
            $_SESSION["error"] = "Password must contain at least one, upper case, lower case, number, and special ";
            header("location: registration.php");
            exit();
          } else {
            if($password != $confirm){
            $_SESSION["error"] = "Password and confirm password do not match";
            header("location: registration.php");
            exit();
        }
        }

        

        if (empty($_POST["email"])) {
            $_SESSION["error"]  = "Email is required";
          } else {
            //  $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $_SESSION["error"]  = "Invalid email format";
             header("location: registration.php");
             exit();
            }
        }

        //check if emailalready exist
        $sql = "SELECT email FROM users WHERE email = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$email]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $rowCount = $statement->rowCount();
    
        if($rowCount > 0){
            $_SESSION["error"] = "Email already exist";//feedback 
            header("location: registration.php");//this will take you back to the page...
            exit();//stop running code below...
        }

        $sql = "INSERT INTO users (email, password) VALUES ( ?, ?)" ;
        $statement = $pdo->prepare($sql);
        $statement->execute([$email, $password]);

        if($statement->rowCount() > 0 ){
            $_SESSION["success"] = "Registration successful!";
            header("location: login.php");//this will take you back to the page...
        } else{
            $_SESSION["error"] = "Failed";
            header("location: registration.php");
        }
    }
    
?>