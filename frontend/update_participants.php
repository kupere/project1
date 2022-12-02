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


<?php

// if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] != true ){

//     header("location:login.php");
//     exit();
// }


include "../backend/db.php";

if (isset($_POST["update_parti"])) {
    $id = $_POST["id"];
    $up_fname = $_POST["up_fname"];
    $up_sname = $_POST["up_sname"];
    $up_username = $_POST["up_username"];
    $up_email = $_POST["up_email"];
    $up_phone = $_POST["up_phone"];



    $up_sql = "UPDATE `participants` SET `fname`='$up_fname',`sname`='$up_sname',`username`='$up_username',`email`='$up_email',`phone`='$up_phone'  WHERE id ='$id'";


    $up_result = mysqli_query($link, $up_sql);

    if ($up_result) {

        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-success'>Records have been updated!</p>";
        echo "<a class='btn btn-primary col-md-4' href='participants.php'>BACK</a>";
        echo "</div>";
    } else {
        echo "Error executing query $up_sql" . mysqli_error($link);
    }
} else {

    if (isset($_GET["id"]) and !empty($_GET["id"])) {

        $id = $_GET["id"];

        $sql = "SELECT * FROM `participants` WHERE id='$id'";

        $result = mysqli_query($link, $sql);

        if ($result) {

            $data = mysqli_num_rows($result);

            if ($data == 1) {

                $row = mysqli_fetch_array($result);

                $fname = $row["fname"];
                $sname = $row["sname"];
                $username =$row["username"];
                $email = $row["email"];
                $phone = $row["phone"];


?>
                <div class="row m-2">
                    <div class="text-primary h3">Update the Record</div>
                </div>
                <div class="row m-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="update_participants.php" method="post" enctype="multipart/form-data">
                            
                                <h1 class="login-title mb-2"><b><u>Update Profile</u></b></h1>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fist Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $fname;?>" name="up_fname" id="inputEmail3" >

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Second Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $sname;?>" name="up_sname" id="inputEmail3" >

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">UserName</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $username;?>" name="up_username" id="inputEmail3" >

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="<?php echo  $email;?>" name="up_email" id="inputEmail3" >

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" value="<?php echo $phone;?>" name="up_phone" id="inputEmail3" >

                                    </div>
                                </div>
                            
                            
                                <div>
                                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                                </div>

                                <div class="row p-2">
                                    <div class="col-md-12">

                                        <input class="btn btn-primary col-md-4" type="submit" name="update_parti" value="UPDATE">
                                        <a class="btn btn-danger" href="participants.php">BACK</a>

                                    </div>

                                </div>


                            </form>


                        </div>
                    </div>
                </div>
                </body>
<?php

            } else {
                echo "No record was found";
            }
        } else {
            echo "error executing query $sql" . mysqli_error($link);
        }
    } else {
        echo "id value not picked";
    }
}


?>