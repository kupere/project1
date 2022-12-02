<?php
include "db.php";

if (isset($_POST["add_member"])) {

    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    


    // // files
    // $photoname = $_FILES["photo"]["name"];
    // $tempname = $_FILES["photo"]["tmp_name"];
    // $folder = "uploads/" . $photoname;


    // Validate

    
        $sql = "INSERT INTO `participants`( `fname`, `sname`, `username`, `email`,`phone`)
         VALUES ('$fname','$sname','$username','$email','$phone')";

        $result = mysqli_query($link, $sql);

        if ($result) {
            echo "add member is successful";
            header("location:../frontend/dashboard.php");
        } else {
            echo "Error executing query" . mysqli_error($link);
        }
    


    mysqli_close($link);
}
