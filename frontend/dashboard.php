<?php
include "../backEnd/db.php";
include "../backend/handle_login.php";

session_start();
//$_SESSION["username"]=$_username2;

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
            $fname = $row["fname"];
            $sname = $row["sname"];
            $username = $row["username"];
            $email = $row["email"];
            $phone = $row["phone"];
        }
    } else {
        echo "no records were found in your database!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/db9ef70621.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <title>Dashboard</title>
</head>

<body class="container-fluid">
    <div class="row">
        <div class="col-3 bg-light  ">

            <div class="">
                <div class="row">
                    <div class="col-2 "> <i class="fa-solid fa-user p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="#">Admin</a></div>
                    <div> <span CLASS="h4 "><?php echo   $email; ?> </span></div>
                </div>
            </div>            <hr>
            <div class="">
                <div class="row">
                    <div class="col-2 "> <i class="fa-solid fa-users p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="./members.php">Members</a></div>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="row">
                    <div class="col-2 "> <i class="fa-solid fa-users p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="./participants.php">Paticipants</a></div>
                </div>
            </div>
            <hr>

            <div class="">
                <div class="row">
                    <div class="col-2 "><i class="fa-solid fa-tasks p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="add_activity.php">Add Activities</a></div>
                </div>
            </div>
            <hr>

            <div class="">
                <div class="row">
                    <div class="col-2 "><i class="fa-solid fa-tasks p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="activities.php">Activities</a></div>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="row">
                    <div class="col-2 "> <i class="fa-solid fa-user p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="about_us.php">About</a></div>
                </div>
            </div>
            <hr>
            <!-- <div class="">
                <div class="row">
                    <div class="col-2 "> <i class="fa-solid fa-gear p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="update_members.php">Settings</a></div>
                </div>
            </div>
            <hr> -->
            <div class="">
                <div class="row">
                    <div class="col-2 "> <i class="fa-solid fa-gear p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="reset_password.php">Reset Password</a></div>
                </div>
            </div>
            <hr>
            <div class="">
                <div class="row">
                    <div class="col-2 "><i class="fa-solid fa-power-off p-3"></i></div>
                    <div class="col text-start"><a class="nav-link " aria-current="page" href="logout.php">Log out</a></div>
                </div>
            </div>
            <hr>


        </div>
        <div class="col-9">
            <nav class="navbar bg-light">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <h3 class="float-start"><span CLASS="h4 "><?php echo   $username; ?> </span><br></h3>
                    <img src="$Photo" class="img-fluid logo h-25">

                </div>
            </nav>
            <!-- <hr>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h2>Dasshboard</h2>
                        </div>
                    </div>
                </div>

            </div> -->
            <hr>
            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM `members`";
                            if ($result = mysqli_query($link, $sql)) {
                                $rowcount = mysqli_num_rows($result);
                                echo "<h4><b>";
                                echo "Total Members are: " . $rowcount;
                                echo "</b></h4>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM `activity`";
                            if ($result = mysqli_query($link, $sql)) {
                                $rowcount = mysqli_num_rows($result);
                                echo "<h4><b>";
                                echo "Total activities is : " . $rowcount;
                                echo "</b></h4>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM `participants`";
                            if ($result = mysqli_query($link, $sql)) {
                                $rowcount = mysqli_num_rows($result);
                                echo "<h4><b>";
                                echo "Total Participants is : " . $rowcount;
                                echo "</b></h4>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary m-1 p-1 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add participant
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Add participant</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" action="../backend/addmember.php" method="post">
                                        <h1 class="login-title">Registration</h1>
                                        <label for="firstname">First name</label>
                                        <input type="text" class="login-input" name="fname" placeholder="First name" required />
                                        <label for="secondname">Second Name</label>
                                        <input type="text" class="login-input" name="sname" placeholder="Second Name" required />
                                        <label for="username">Username</label>
                                        <input type="text" class="login-input" name="username" placeholder="Username" required />
                                        <label for="email">Email</label>
                                        <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="login-input" name="phone" placeholder="Phone Number" required>

                                </div>
                                <button type="button" class="btn btn-secondary mt-2 float-start" data-bs-dismiss="modal">cancel</button>
                                <input type="submit" name="add_member" class="btn btn-success mt-2  float-end" value="Add">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>


            <div class="row text-center">

                <div class="card">
                    <div class="card-body">
                        <h2>Members</h2>
                        <table class="table table-hover">
                            <tr>
                                <td>#</td>
                                <td>First Name</td>
                                <td>SECOND Name</td>
                                <td>USER Name</td>
                                <td>EMAIL</td>
                                <td>PHONE NUMBER</td>
                            </tr>

                            <tr>
                                <td>
                                    <?php echo $id ?>
                                </td>
                                <td>
                                    <?php echo $fname ?>
                                </td>
                                <td>
                                    <?php echo $sname ?>
                                </td>
                                <td>
                                    <?php echo $username ?>
                                </td>
                                <td>
                                    <?php echo $email ?>
                                </td>
                                <td>
                                    <?php echo $phone ?>
                                </td>

                            </tr>

                        </table>

                    </div>
                </div>

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
    <footer class="text-center bg-light">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">&copy:Kupere systems co</h5>

            </div>
        </div>
    </footer>
</body>

</html>