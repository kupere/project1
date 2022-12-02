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

if (isset($_POST["update_activity"])) {
    $id = $_POST["id"];
    $up_name = $_POST["up_name"];
    $up_description = $_POST["up_description"];



    $up_sql = "UPDATE `activity` SET `name`='$up_name',`decription`='$up_description'  WHERE id ='$id'";

    $up_result = mysqli_query($link, $up_sql);

    if ($up_result) {

        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-success'>Records have been updated!</p>";
        echo "<a class='btn btn-primary col-md-4' href='activities.php'>BACK</a>";
        echo "</div>";
    } else {
        echo "Error executing query $up_sql" . mysqli_error($link);
    }
} else {

    if (isset($_GET["id"]) and !empty($_GET["id"])) {

        $id = $_GET["id"];

        $sql = "SELECT * FROM `activity` WHERE id='$id'";

        $result = mysqli_query($link, $sql);

        if ($result) {

            $data = mysqli_num_rows($result);

            if ($data == 1) {

                $row = mysqli_fetch_array($result);

                $name = $row["name"];
                $description = $row["decription"];



?>
                <div class="row m-2">
                    <div class="text-primary h3">Update the Record</div>
                </div>
                <div class="row m-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                            
                                <h1 class="login-title mb-2"><b><u>Update Activity</u></b></h1>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Activity Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $name;?>" name="up_name" id="inputEmail3" >

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Activity Description</label>
                                    <div class="col-sm-10">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="up_description" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea"><?php echo  $description; ?> </label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                                </div>

                                <div class="row p-2">
                                    <div class="col-md-12">

                                        <input class="btn btn-primary col-md-4" type="submit" name="update_activity" value="UPDATE">
                                        <a class="btn btn-danger" href="activities.php">BACK</a>

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