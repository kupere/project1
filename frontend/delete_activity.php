
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

include "../backend/db.php";
session_start();
//check if user has logged in?

// if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
//     header("location:index.php");
//     exit();
// }



if (isset($_POST["delete"]) and !empty($_POST["id"])){
    $id = $_POST["id"];
    $sql = "DELETE FROM `activity` WHERE id='$id'";
    $result = mysqli_query($link, $sql);

    if ($result){
        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-danger'>Record deleted Successfully</p>";
        echo "<a class='btn btn-primary col-md-4' href='activities.php'>BACK</a>";
        echo "</div>";
        header("location:activities.php");

    }else{
        echo "Error executing query $sql" .mysqli_error($link);
    }

}else{

}

    ?>

  
    <div class="container">


           <div class="row m-2">
                <div class="alert alert-warning">

                    <form action="delete_activity.php" method="post">
                        <div class="p-2 text-center">
                            <label class="form-label">Are you sure you want to delete this record?</label> <br>
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        </div>
                        <div class="p-2 text-center">
                            <input type="submit" name="delete" value="YES" class="btn btn-danger col-md-3">
                            <a href="activities.php" class="btn btn-primary col-md-3">NO</a>
                        </div>
                    </form>

                </div>
            </div>

    </div>
    </body>
    </html>
