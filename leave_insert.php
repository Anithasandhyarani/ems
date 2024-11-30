<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "employee_management_db");
$type = $_POST['type'];
$category = $_POST['category'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$remarks = $_POST['remarks'];

$_SESSION['type'] = $type;
$_SESSION['category'] = $category;
$_SESSION['startdate'] = $startdate;
$_SESSION['enddate'] = $enddate;
$_SESSION['remarks'] = $remarks;

$remarks = $_POST['remarks'] ?? '';

$leave_error = "";
if (empty($_POST['type'])) {
    $leave_error = 1;
} else if (empty($_POST['category'])) {
    $leave_error = 2;
} else if (empty($_POST['startdate'])) {
    $leave_error = 3;
} else if (empty($_POST['enddate'])) {
    $leave_error = 4;
} elseif (empty($_POST['remarks'])) {
    $leave_error = 5;
}

if ($leave_error == "") {

    $id = $_SESSION['user_id'];

    $sql = "INSERT INTO employee_leave(type,category,startdate,enddate,remarks,user_id) VALUES('$type','$category','$startdate','$enddate','$remarks','$id')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['leav'] = "inserted successfully";
        header("location:leave.php?leave=leav");
        unset($_SESSION['type']);
        unset($_SESSION['category']);
        unset($_SESSION['startdate']);
        unset($_SESSION['enddate']);
        unset($_SESSION['remarks']);
    } else {
        echo "not inserted";
    }
} else {
    echo $leave_error . $sql;
    header("location:leave.php?leave_error=$leave_error");
}
