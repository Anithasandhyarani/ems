<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "employee_management_db");
$Name = $_POST['Name'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$email = $_POST['email'];
$department = $_POST['department'];


$_SESSION['Name'] = $Name;
$_SESSION['email'] = $email;
$_SESSION['department'] = $department;




$employee_error = "";

if (empty($_POST['Name'])) {
    $employee_error = 1;
} else if (!preg_match("/^[A-Za-z]+ [A-Za-z]+$/", $_POST["Name"])) {
    $employee_error = 2;
} else if (empty($_POST['password'])) {
    $employee_error = 3;
} else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $_POST['password'])) {
    $employee_error  = 4;
} else if (empty($_POST['confirmPassword'])) {
    $employee_error  = 5;
} elseif ($password !== $confirmPassword) {
    $employee_error  = 6;
} else if (empty($_POST['email'])) {
    $employee_error  = 7;
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $employee_error  = 8;
} else if (empty($_POST['department'])) {
    $employee_error  = 9;
}

if ($employee_error == "") {


    $sql = "INSERT INTO employee(name,password,email,department) VALUES('$Name','$password','$email','$department')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['suc'] = "inserted successfully";
        header("location:add_employee.php? success=suc");
        unset($_SESSION['Name']);
        unset($_SESSION['email']);
        unset($_SESSION['department']);
    } else {
        echo "not inserted";
    }
} else {

    echo $employee_error . $sql;
    header("location:add_employee.php ? employee_error=$employee_error");
}
