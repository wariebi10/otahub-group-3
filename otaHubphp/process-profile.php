<?php
    //If add or edit button is set then run all the codes within
    if(isset($_POST['enter']) || isset($_POST['update'])){

        Session_Start();

        require 'database-connect.php';
        
        $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF'];

        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);        
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $session = filter_input(INPUT_POST, 'session', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $image_fullname = $_FILES['image']['name'];

        if(!empty($image_fullname)){
        
            $image_size = $_FILES['image']['size'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_ext = explode('.', $image_fullname);
            $image_ext = strtolower(end($image_ext));

            $dayInNumber = date("d");
            $monthInNumber = date("m");
            $year = date("Y");
            $time24Hour = date("G");
            $timeMin = date("i");
            $timeSecs = date("s");
            $image_fullname = "{$phone}{$dayInNumber}{$monthInNumber}{$year}{$time24Hour}{$timeMin}{$timeSecs}.{$image_ext}";
            $target_dir = "upload/{$image_fullname}";
        }

        if(isset($_POST['enter'])){

            if(empty($user_id) || empty($fullname) || empty($username) || empty($email) || empty($phone) || empty($gender) || empty($session) || empty($image_fullname)){
                $_SESSION['error'] = "All fields are required";
                header("Location: profile.php");
                exit();
            }

            if(!in_array($image_ext, $allowed_ext)){
                $_SESSION['error'] = "Invalid file type";
                header("Location: profile.php");
                exit();
            }

            if($image_size > 1000000){ 
                $_SESSION['error'] = "File too large";
                header("Location: profile.php");
                exit();
            }

            $session_id = $_SESSION['id'];
            $sql = "SELECT * FROM profile WHERE user_id =?";
            $stmt =  $pdo->prepare($sql);
            $stmt->execute([$session_id]);
            
            if($stmt->rowCount() > 0){
                $_SESSION['error'] = "Profile already created";
                header("Location: profile.php");
                exit();
            }

            $sql = "INSERT INTO profile (user_id, fullname, username, email, phone, gender, session, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user_id, $fullname, $username, $email, $phone, $gender, $session, $image_fullname]);

            move_uploaded_file($image_tmp, $target_dir);

            if($stmt->rowCount() > 0){
                $_SESSION['success'] = "Successfully added student";
                
                header("Location: profile.php");
            }else{
                $_SESSION['error'] = "Failed to add student";
                header("Location: profile.php");
            }
        }
    }
    
    if(isset($_POST['update'])){

        $update = "SELECT * FROM profile WHERE id='$user_id'";
        $stmt =  $pdo->prepare($update);
        $stmt->execute([$fullname, $username, $phone, $gender, $session, $image]);

            if(empty($user_id) || empty($fullname) || empty($username) || empty($email) || empty($phone) || empty($gender) || empty($session) ){
                $_SESSION['error'] = "All fields are required";
                header("Location: profile.php");
                exit();
            }
        
            if(!empty($image_fullname)){
                if(!in_array($image_ext, $allowed_ext)){
                    $_SESSION['error'] = "Invalid file type";
                    header("Location: profile.php");
                    exit();
                }
            }
        
            if(!empty($image_fullname)){
                if($image_size > 1000000){
                    $_SESSION['error'] = "File too large";
                    header("Location: profile.php");
                    exit();
                }
            }
        
            
            if(empty($image_fullname)){
        
                $sql = "UPDATE profile SET fullname = ?, username = ?, phone = ?, gender = ?, session = ? WHERE user_id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$fullname, $username, $phone, $gender, $session, $user_id]);
            }else{
                $sql = "UPDATE profile SET fullname = ?, username = ?, phone = ?, gender = ?, session = ?, image = ? WHERE user_id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$fullname, $username, $phone, $gender, $session, $image_fullname, $user_id]);
        
                move_uploaded_file($image_tmp, $target_dir);
            }
        
            if($stmt->rowCount() > 0){
                $_SESSION['success'] = "Successfully updated users";
                header("Location: profile.php");
            }else{
                $_SESSION['error'] = "Failed to update users";
                header("Location: profile.php");
            }
           
    }


    if(isset($_POST['send'])){

        Session_Start();
    
        require 'database-connect.php';
            
        $allowed_ext = ['png', 'jpg', 'jpeg', 'rtf','Xls', 'TIFF', 'DOC', 'ZIP', 'JAR', 'Bib', 'apk', '3GP', 'exe', 'txt', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF', 'pdf', 'mp3', 'mp4', 'PDF', 'MP3', 'MP4'];
    
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $fullname =  filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $file_name = $_FILES['files']['name'];
    
        if(!empty($file_name)) {
            
            $file_size = $_FILES['files']['size'];
    
            $file_tmp = $_FILES['files']['tmp_name'];
            //Get file extension
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
    
            $dayInNumber = date("d");
            $monthInNumber = date("m");
            $year = date("Y");
            $time24Hour = date("G");
            $timeMin = date("i");
            $timeSecs = date("s");
            $file_name = "{$dayInNumber}{$monthInNumber}{$year}{$time24Hour}{$timeMin}{$timeSecs}.{$file_ext}";
            $target_dir = "upload/{$file_name}";
            $time_sent="{$dayInNumber}{$monthInNumber}{$year}{$time24Hour}{$timeMin}{$timeSecs}";
            $_SESSION['$time_sent'];
        }
    
        if(empty($text)){
            $_SESSION['error']="all fields are required";
            header("location: community.php");
            exit();
        }
    
        if(empty($file_name)){
            
            //Create our sql query statement
            $sql = "INSERT INTO community (image, fullname,text, files) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$image, $fullname, $text, $file_name]);
    
            if($stmt->rowCount()>0){
                $_SESSION['success']="sent";
                header("location: post.php");
                exit();
            }else{
                $_SESSION['error']="not sent";
                header("location: community.php");
            }
    
            
            
        }
        if(!empty($file_name)){
    
            $sql = "INSERT INTO community (image, fullname, text, files) VALUES (?, ?, ?, ? )";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$image, $fullname,$text, $file_name]);
            move_uploaded_file($file_tmp, $target_dir);
    
            if(in_array($file_ext, $allowed_ext)){
                $_SESSION['success']="sent";
                header("location: post.php");
                exit();
            }
            if($file_size > 25000000){
                $_SESSION['error']="file size is too large";
                header("location: community.php");
                exit();
            }
    
        }
    }


?>