<?php
include "db.php";

if (isset($_POST["add_activity"])) {

    $name = $_POST["name"];
    $description = $_POST["description"];





    $sql = "INSERT INTO `activity`(`name`, `decription`) VALUES ('$name','$description')";

    $result = mysqli_query($link, $sql);

    if ($result) {
        echo "activity added  successfully ";
        header("location:../frontend/dashboard.php");
    } else {
        echo "Error executing query" . mysqli_error($link);
    }


    mysqli_close($link);
}
