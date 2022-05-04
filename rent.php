<?php 

    session_start();
    if(!isset($_SESSION['fname'])){
        header('location: index.html');
    }

    include 'conn.php';

    $id = $_GET['id'];
    $st_date = $_POST['st_date'];
    $la_date = $_POST['la_date'];

    $new_st = strtotime($st_date);
    $new_la = strtotime($la_date);

    $diff = abs($new_la - $new_st);
    $Days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $username = $_SESSION['username'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

    $sql= "UPDATE `car_details` SET `Days`='$Days', `st_date`='$st_date',`la_date`='$la_date', `username`='$username', `F_name`='$fname', `L_name`='$lname' WHERE `id`=$id";

    $query = mysqli_query($con, $sql);

    if($query){
        header("Location: available_cars.php");
    }
    else{
        echo "Something went wrong";
    }
?>