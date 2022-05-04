<?php

    session_start();

    include '../conn.php';
    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($username) && !empty($password)){
        $search= "select * from admin_user where username = '$username'";
        $query = mysqli_query($con, $search);
        $count = mysqli_num_rows($query);

        if($count){
            $pass= mysqli_fetch_assoc($query);
            $dbpass = $pass['password'];
            $_SESSION['Name'] = $pass['Name'];
            $pass_decode = password_verify($password, $dbpass);

            if($pass_decode){
                echo "Success";
            }
            else{
                echo "Password is incorrect.";
            }
        }
        else{
            echo "$username - Username not exist.";
        }
    }
    else{
        echo "All input field are required.";
    }
?>