<?php

    session_start();

    include_once 'conn.php';

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $email_search="select * from customer_login where email = '$email'";
        $log_query = mysqli_query($con, $email_search);
     
        $emailcount=mysqli_num_rows($log_query);
        if($emailcount){
            $email_pass = mysqli_fetch_assoc($log_query);
            $dbpass = $email_pass['password'];

            $pass_decode= password_verify($password, $dbpass);
            if($pass_decode){
                $_SESSION['fname'] = $email_pass['First_name'];
                $_SESSION['lname'] = $email_pass['Last_name'];
                $_SESSION['username'] = $email;
                echo "Success";
            }
            else{
                echo "Password is incorrecct";
            }
        }
        else{
            echo "$email - This email doesnot exist";
        }
    }
    else{
        echo "All input field are required.";
    }

?>