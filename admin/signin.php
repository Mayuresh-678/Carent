<?php
    include '../conn.php';

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($name) && !empty($username) && !empty($password)){

        $verify_query = "select * from admin_user where Name = '$name' or username = '$username' ";
        $query = mysqli_query($con, $verify_query);
        $count = mysqli_num_rows($query);

        if($count>0){
            echo "Name or Username is already exist";
        }
        else{
            $en_pass = password_hash($password, PASSWORD_BCRYPT);
            $insertquery = "insert into admin_user (Name, username, password) values('$name', '$username', '$en_pass')";
            $sec_query = mysqli_query($con, $insertquery);

            if($sec_query){
                echo"Successfully added.";
            }
            else{
                echo "Something went wrong";
            }
        }
    }
    else{
        echo "All input field are required.";
    }
?>


