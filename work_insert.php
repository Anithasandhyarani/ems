<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "employee_management_db");
$project = $_POST['project'];
$date = $_POST['date'];
$status = $_POST['status'];

$_SESSION['project'] = $project;
$_SESSION['date'] = $date;
$_SESSION['status'] = $status;

$id = $_SESSION['user_id'];


$workError = "";

if (empty($_POST['project'])) {
    $workError = 1;
} else if (! preg_match("/^[a-zA-Z ]*$/", $_POST['project'])) {
    $workError = 2;
} else if (empty($_POST['date'])) {
    $workError = 3;
} else if (empty($_POST['status'])) {
    $workError = 4;
}

if ($workError == "") {


    $sql = "INSERT INTO work_status(project_name, date,work_status,user_id) VALUES('$project','$date ','$status','$id')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['sta'] = "inserted successfully";
        header("location:work_status.php?status=sta");
        unset($_SESSION['project']);
        unset($_SESSION['date']);
        unset($_SESSION['status']);
    } else {
        echo "not inserted";
    }
} else {
    echo  $workError . $sql;
    header("location:work_status.php?workError=$workError");
}
