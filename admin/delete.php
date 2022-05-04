<?php
    session_start();

    if(!isset($_SESSION['Name'])){
        header('location: ../admin/index.html');
    }
    include '../conn.php';    

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql= "Delete from car_details where id = '$id'";
        if($con->query($sql) === TRUE){
            header("Location: func.php");
        }
        else{
            echo "Somthing went wrong";
        }
    }
    else{
        die('id not proided.');
    } 

?>