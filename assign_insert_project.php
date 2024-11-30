<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "employee_management_db");
$name = $_POST['name'];
$project = $_POST['project'];
$date = $_POST['date'];

$_SESSION['name'] = $name;
$_SESSION['project'] = $project;
$_SESSION['date'] = $date;


$id = $_SESSION['user_id'];


$assign_error = "";

if (empty($_POST['name'])) {
    $assign_error = 1;
} else if (!preg_match("/^[A-Za-z]+ [A-Za-z]+$/", $_POST["name"])) {
    $assign_error = 2;
} else if (empty($_POST['project'])) {
    $assign_error = 3;
} else if (! preg_match("/^[a-zA-Z ]*$/", $_POST['project'])) {
    $assign_error = 4;
} else if (empty($_POST['date'])) {
    $assign_error = 5;
}

if ($assign_error == "") {


    $sql = "INSERT INTO work_assign(name,project_name, end_date,user_id) VALUES('$name','$project','$date ','$id')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['sta'] = "inserted successfully";
        header("location:assign_project.php?status=sta");
        unset($_SESSION['name']);
        unset($_SESSION['project']);
        unset($_SESSION['date']);
    } else {
        echo "not inserted";
    }
} else {
    echo $assign_error . $sql;
    header("location:assign_project.php?assign_error=$assign_error");
}
