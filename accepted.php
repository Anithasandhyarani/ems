<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "employee_management_db") or die('cant connect');

$id = $_GET['id'];
$sql = "UPDATE employee_leave SET status='1' WHERE id='$id'";

if ($con->query($sql) === TRUE) {

    $acc = "accepted successfully";
    header("location:view_leave.php?acc=$acc");
} else {
    echo "Error  ";
}
