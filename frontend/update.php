
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

// if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true ){

//     header("location:login.php");
//     exit();
// }


include "../backend/db.php";

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $up_fName = $_POST["upfname"];
    $up_SName = $_POST["upsname"];
    $up_userName = $_POST["upusername"];
    $up_email = $_POST["upemail"];
    $up_phone = $_POST["upphone"];


    $up_sql = "UPDATE `participants` SET `fname`='$up_fName',`sname`='$up_SName',`username`='$up_userName',`email`='$up_email',`phone`='$up_phone'   WHERE id ='$id'";

    $up_result = mysqli_query($link, $up_sql);

    if ($up_result) {

        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-success'>Records have been updated!</p>";
        echo "<a class='btn btn-primary col-md-4' href='dashboard.php'>BACK</a>";
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

                $fName = $row["fname"];
                $sName = $row["sname"];
                $userName =$row["username"];
                $email = $row["email"];
                $phone = $row["phone"];


?>
                <div class="row m-2">
                    <div class="text-primary h3">Update the Record</div>
                </div>
                <div class="row m-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">First Name</label>
                                        <input class="form-control" type="text" name="upfname" value="<?php 
                                        echo $fName; 
                                        ?>">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Second Name</label>
                                        <input class="form-control" type="text" name="upsname" value="<?php
                                         echo  $sName;
                                          ?>">
                                    </div>

                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">User Name</label>
                                        <input class="form-control" type="text" name="upusername" value="<?php
                                         echo $userName;
                                          ?>">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Email</label>
                                        <input class="form-control" type="email" name="upemail" value="<?php
                                        echo $email; 
                                        ?>">
                                    </div>
                                </div>
                             
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Phone Number</label>
                                        <input class="form-control" type="tel" name="upphone" value="<?php 
                                        echo  $phone;
                                         ?>">
                                    </div>
                                </div>
                               
                                <div>
                                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                                </div>

                                <div class="row p-2">
                                    <div class="col-md-12">

                                        <input class="btn btn-primary col-md-4" type="submit" name="update" value="UPDATE">
                                        <a class="btn btn-danger" href="members.php">BACK</a>

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