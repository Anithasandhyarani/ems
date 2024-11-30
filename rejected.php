<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "employee_management_db") or die('cant connect');

$id = $_GET['id'];
$sql = "UPDATE employee_leave SET status='2' WHERE id='$id'";

if ($con->query($sql) === TRUE) {

    $rej = "Rejected successfully";
    header("location:view_leave.php?rej=$rej");
} else {
    echo "Error  ";
}
