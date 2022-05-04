<?php
    session_start();

    if(!isset($_SESSION['Name'])){
        header('location: ../admin/index.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <title>Admin page</title>
</head>
<body>
    <div class="container" >
        <nav>
            <div class="logo-name">
                <img src="bg/bg2.jpg" alt="Logo">
                <h2>Carent</h2>
            </div>
            <div class="btn-box">
                <input type="button" id="show-btn" value="Availabel Cars">
                <input type="button" id="add-btn" value="Add Car">
                <a href="logout.php">
                    <input type="button" value="Logout">
                </a>
                <i class="material-icons outlined" id="add-admin">person_add</i>
            </div>
        </nav>

        <h2 class="name">Hello <?php echo $_SESSION['Name'] ?></h2>

        <div class="wrapper add-car" style="display: none;">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="heading">
                    <h2>Add New Car</h2>
                </div>
                <div class="error-text">This is an error message</div>
                <div class="field input">
                    <label for="name">Model Name</label>
                    <input type="text" name="m_name" id="name" placeholder="Enter model name" >
                </div>
                <div class="field input">
                    <label for="number">Vehicle Number</label>
                    <input type="text" name="v_number" id="number" placeholder="Enter model number" >
                </div>
                <div class="field input">
                    <label for="seat">Seating Capacity</label>
                    <input type="number" min="2" max="10" name="seat" id="seat" placeholder="Enter number of seats" >
                </div>
                <div class="field input">
                    <label for="price">Rent per day</label>
                    <input type="number" min="200" name="rent" id="price" placeholder="Enter rent per day" >
                </div>
                <div class="field file">
                    <label for="image">Vehicle Image</label>
                    <input type="file" name="image" id="image" >
                </div>
                <div class="field button">
                    <button type="submit" id="Add" name="add-car" >Add car</button>
                </div>
            </form>
        </div>



        <div class="avail-cars">
            <div class="switch"> 
                <button id="show-avail">Availabel Cars</button>
                <button id="show-booked">Booked Cars</button>
            </div>

            <div class="available-cars" id="main">
                 
                <?php
                    include '../conn.php';

                    $select = "select * from car_details where Days = '0'";
                    $query = mysqli_query($con, $select);
                    $total = mysqli_num_rows($query);

                    if($total > 0){
                        while($result = mysqli_fetch_assoc($query)){
                            available($result['id'],$result['Images'],$result['M_name'], $result['V_number'], $result['Seat'], $result['Rent']);
                        }
                    }
                    else{
                        echo "Their is no data.";
                    }
                ?>  
            </div>

            <div class="booked-cars" id="sub" style="display: none;">
                
                <?php

                    $select = "select * from car_details where Days != '0'";
                    $query = mysqli_query($con, $select);
                    $total = mysqli_num_rows($query);

                    if($total > 0){
                        while($result = mysqli_fetch_assoc($query)){
                            ?>
                                <div class='card'>
                                    <img src='images/<?php echo $result['Images'];?>' alt='car image'>
                                    <div class='details'>
                                        <div class='info m-name'>
                                            <i class='material-icons outlined'>directions_car</i>
                                            <h1><?php echo $result['M_name'];?></h1>
                                        
                                        </div>
                                        <div class='info m-number'>
                                            <i class="material-icons outlined">pin</i>
                                            <h3><?php echo $result['V_number'];?></h3>
                                        </div>
                                        <div class='info rent'>
                                            <i class='material-icons outlined'>currency_rupee</i>
                                            <p>₹ <?php echo $result['Rent'];?> /day </p>
                                        </div>
                                        <div class='info seat'>
                                            <i class='material-icons outlined'>calendar_today</i>
                                            <p>Rented for <?php echo $result['Days'];?> days From <?php $result['st_date'];?> to <?php $result['la_date'];?>.</p>
                                        </div>
                                        <span style="text-align:center; background-color:#f8d7da; font-weight:bold;">
                                            <p>Customer's name: <?php echo $result['F_name'];?>  <?php echo $result['L_name'];?></p>
                                            <p>Email Id: <?php echo $result['username'];?> </p>
                                        </span>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    else{
                        echo "Their is no data.";
                    }
                ?>
            </div>
        </div>

        <div class="signinpopup">
            <div class="wrapper" id="add-admin-form">
                <form action="signin.php" method="post"> 
                    <span class="material-icons" id="close-popup">cancel</span>
                    <div class="heading">
                        <h1>Add Admin user</h1>
                        <p>(Admin use only)</p>
                    </div>
                    <div class="error-text">This is an error message</div>
                    <div class="field input">
                        <label for="pos_name">Position Name</label>
                        <input type="text" name="name" id="pos_name" placeholder="Enter position name" >
                    </div>
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter your username" >
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter the password" >
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="field button">
                        <button name="signin" id="signin-btn" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    

<?php

function available($id,$Images,$M_name,$V_number,$Seat,$Rent){
    $element= "
        <div class='card'>
            <img src='images/$Images' alt='car image'>
            <div class='details'>
                <div class='info m-name'>
                    <i class='material-icons outlined'>directions_car</i>
                    <h1>$M_name</h1>
                </div>
                <div class='info m-number'>
                    <i class='material-icons outlined'>pin</i>
                    <h3>$V_number</h3>
                </div>
                <div class='info seat'>
                    <i class='material-icons outlined'>airline_seat_recline_normal</i>
                    <p>$Seat seats</p>
                </div>
                <div class='info rent'>
                    <i class='material-icons outlined'>currency_rupee</i>
                    <p>₹ $Rent/day </p>
                </div>
                <div class='info button'>
                    <a name='delete' href='delete.php?id=$id'>Delete</a>
                    <a id='edit' name='edit' href='edit.php?id=$id'>Edit</a>
                </div>
            </div>
        </div>
        ";
        echo $element;
};

?>

    <script src="script.js"></script>
    <script src="js/signin.js"></script>
    <script src="js/add.js"></script>
</body>
</html>