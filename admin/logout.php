<?php

    session_start();

    if(!isset($_SESSION['Name'])){
        header('location: ../admin/index.html');
    }

    session_destroy();

    header('location:../admin/index.html');

?>