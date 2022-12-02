<?php
include "db.php";

if (isset($_POST['login'])) {

    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];

     //comparing the data with the one in the database
    $sql = "SELECT * FROM `members` WHERE  email='$userEmail'";

    $result = mysqli_query($link, $sql);

//if  query runs
    if ($result) {

        $data = mysqli_num_rows($result);


        if ($data == 1) {

            while ($row = mysqli_fetch_array($result)) {

                $id = $row['id'];
                $emailAddress = $row["email"];
                $username = $row["username"];
                $password = $row["password"];
                $user_type = $row['usertype'];
                // verify the password
                if (password_verify($userPassword, $password)) {
                                  
                // check for user type if its superadmin or just user
                    if ($row['usertype'] == "") {

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION["email"] = $email;
                        $_SESSION['usertype'] == $user_type;

                        header("location:../frontend/user_dashboard.php");
                    }
                    else if ($row['usertype'] == 'admin') {

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION["email"] = $email;
                        $_SESSION['usertype'] == $user_type;

                        header("location:../frontend/dashboard.php");

                    }
                    else {
                        echo "Please ask Admin to assign you a user type";
                    }
                }
                else {
                    echo "Wrong password!";
                }

            }
        }
        else {
            echo "No such email address found";

        }
    }


}