<?php
include "../backEnd/db.php";

session_start();
//check if user has looged in?
// if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true ){

//     header("location:../frontEnd/login.php");
//     exit();
// }
$sql = "SELECT * FROM `members` ";
#execute query
$result = mysqli_query($link, $sql);

#check
if ($result) {
    $data = mysqli_num_rows($result);
    #is there data here?
    if ($data > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            

        }
    }
 else {
    echo "no records were found in your database!";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="">
<header id="header" class="d-flex align-items-center m-0">
  
</header>
<hr style="background-color:#199EB8 ">
<div class="container-fluid mt-0">
    <div class="row">
        <div class="col-3 " style="background-color:#199EB8 ">

            <ul class="nav flex-column">
                <li class="nav-item stylenav">
                    <a class="nav-link active text-white" aria-current="page" href="#">
                        <i class="fa fa-user-circle-o fa-2x"></i>
                        <span CLASS="h4 "><?php echo  $username; ?> </span><br>
                        <span CLASS="h4 "><?php echo  $email; ?> </span>

                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="about_us.php">
                        <i class="fa fa-home fa-lg text-white"></i>
                        <span class="text-white">HOME</span>
                    </a>
                    
                </li>
                
                <li class="nav-item stylenav">
                    <a class="nav-link" href="about_us.php">
                        <i class="fa fa-home fa-lg text-white"></i>
                        <span class="text-white">About</span>
                    </a>
                    
                </li>
                <li class="nav-item stylenav">
                <a class="nav-link" href="update_members.php">
                    <i class="fa fa-wrench fa-lg text-white"></i>
                        <span class="text-white">Update Profile</span>
                    </a>
                </li>
                  
                <li class="nav-item stylenav">
                    <a class="nav-link" href="reset_password.php">
                        <i class="fa fa-wrench fa-lg text-white"></i>
                        <span class="text-white">Reset password</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="../frontend/login.php">
                        <i class="fa fa-signout fa-lg text-white"></i>
                        <button class="btn btn-outline-dark"><span class="text-white">Log out</span></button>
                    </a>
                </li>
            </ul>

        </div>

        <div class="col-9 bg-light">
        <div class="card">
                    <div class="card-body">
                        <h2>Activity</h2>
<?php

$sql = "SELECT * FROM `activity`";
#execute query
$result = mysqli_query($link, $sql);

#check
if ($result) {
    $data = mysqli_num_rows($result);
    #is there data here?
    if ($data > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $name = $row["name"];
            $decription = $row["decription"];    
        }
    } else {
        echo "no records were found in your database!";
    }
}

?>

                        
                        <table class="table table-hover">
                            <tr>
                                <td>#</td>
                                <td>Activity Name</td>
                                <td>Activity Description</td>
                            </tr>
                            <tr>
                                <td> <?php echo $id ?></td>
                                <td> <?php echo $name ?></td>
                                <td> <?php echo $decription ?></td>
                            </tr>
                           
                        </table>
                    </div>

                </div>



            </div>
        </div>
    </div>
  
        </div>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
</html>