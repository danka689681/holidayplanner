<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["access"] !== "admin"){
    header("location: homepage.php");
    exit;
}

?>