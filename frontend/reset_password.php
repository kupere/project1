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

session_start();

include "../backend/db.php";

// // check if user has looged in?
// if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true ){

//     header("location:index.php");
//     exit();
// }

if (isset($_POST['reset'])) {
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];


    if (strlen($newPass) < 6) {
        $passError = "Password must have more than 6 characters";
        echo $passError;
    } else {
        $storePass = password_hash($newPass, PASSWORD_DEFAULT);
    }

    if ($confirmPass != $newPass) {
        $conPassErr = "Passwords do not Match!";
        echo $confirmPass;
    }


    if (empty($passError) and empty($conPassErr)) {

        $up_sql = "UPDATE `members` SET `password`='$storePass'";

        $up_result = mysqli_query($link, $up_sql);

        if ($up_result) {

            echo "<div class='row m-2 text-center'>";
            echo "<p class='alert alert-success'>Records have been updated!</p>";
            echo "</div>";
        } else {
            echo "Error executing query $up_sql" . mysqli_error($link);
        }
    }
} else {
    if (isset($_GET["id"]) and !empty($_GET["id"])) {

        $id = $_GET["id"];

        $sql = "SELECT * FROM `members` WHERE id='$id'";

        $result = mysqli_query($link, $sql);
    }
}
?>





<div class="row m-2">
    <div class="card">
        <div class="card-header text-primary bg-white h4">Reset Password</div>
        <div class="card-body">
            <form action="reset_password.php" method="post" enctype="multipart/form-data">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">New Password</span>
                    <input type="password" name="newPass" class="form-control" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Confirm Password</span>
                    <input type="password" name="confirmPass" class="form-control" aria-describedby="basic-addon2" required>
                </div>
                <div>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                </div>
                <div class="input-group mb-3">
                    <input type="submit" name="reset" value="RESET PASSWORD" class="btn btn-danger m-2  col-md-4 ">
                    <a class='btn btn-primary m-2 col-md-4 float-end' href='dashboard.php'>BACK</a>
                </div>



            </form>
        </div>
    </div>
</div>