<?php
session_start();
if (!isset($_SESSION['password'])) {
    header("location:login.php");
}
$con = mysqli_connect("localhost", "root", "", "employee_management_db");
$ui = $_SESSION['user_id'];
$today = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$time = date("h:i:sa");

$sql = "INSERT INTO loggedin (user_id,logout_date,logout_time) VALUES('$ui', '$today','$time')";
if (mysqli_query($con, $sql)) {


    header("location:login.php");
    session_destroy();
    die();
}
