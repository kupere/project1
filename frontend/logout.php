<?php
session_start();
// session destroy
if(session_destroy()) {

    // redirect to login page
    header("location:login.php");
}
?>