<?php
include "db.php";

if (isset($_POST["register"])) {

    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST['password'];
    $password2 = $_POST["password2"];


    // // files
    // $photoname = $_FILES["photo"]["name"];
    // $tempname = $_FILES["photo"]["tmp_name"];
    // $folder = "uploads/" . $photoname;


    // Validate

    if (strlen($password) < 6) {
        $passError = "Password must have more than 6 characters";
        echo $passError;
    } else {
        $storePass = password_hash($password, PASSWORD_DEFAULT);
    }

    if ($password2 != $password) {
        $conPassErr = "Passwords do not Match!";
        echo $conPassErr;
    }


    if (empty($passError) and empty($conPassErr)) {

        $sql = "INSERT INTO `members`( `fname`, `sname`, `username`, `email`,`phone`, `password`)
         VALUES ('$fname','$sname','$username','$email','$phone','$storePass')";

        $result = mysqli_query($link, $sql);

        if ($result) {
            echo "You have been registered";
            header("location:../frontend/login.php");
        } else {
            echo "Error executing query" . mysqli_error($link);
        }
    }


    mysqli_close($link);
}
