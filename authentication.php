<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "employee_management_db");
$name = strtolower($_POST['name']);
$password = strtolower($_POST['password']);
$_SESSION['name'] = $name;
$_SESSION['password'] = $password;


$sql = "SELECT * FROM employee WHERE   name='$name' and password='$password'";
$result = (mysqli_query($con, $sql));



if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['user_id'] = $row['id'];
    $ui = $_SESSION['user_id'];
    $_SESSION['date'] = $row['id'];
    $_SESSION['isadmin'] = $row['isadmin'];
    $_SESSION['name'] = $row['name'];


    $today = date("Y-m-d");
    date_default_timezone_set("Asia/Kolkata");
    $time = date("h:i:sa");
    $sql = "INSERT INTO loggedin (user_id, login_date,login_time) VALUES('$ui', '$today','$time')";


    if (mysqli_query($con, $sql)) {
        header("location:dashboard.php");
    } else {
        echo "date error";
    }
} else {
    $log = "invalid credentials";
    header("location:login.php?log=$log");
}
