<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "employee_management_db");
$name = strtolower($_POST['name']);
$password = strtolower($_POST['password']);
$confirmPassword = strtolower($_POST['confirmPassword']);
$email = $_POST['email'];
$department = $_POST['department'];

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['department'] = $department;



$error = "";

if (empty($_POST['name'])) {
    $error = 1;
} else if (!preg_match("/^[A-Za-z]+ [A-Za-z]+$/", $_POST["name"])) {
    $error = 2;
} else if (empty($_POST['password'])) {
    $error = 3;
} else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $_POST['password'])) {
    $error = 4;
} else if (empty($_POST['confirmPassword'])) {
    $error = 5;
} elseif ($password !== $confirmPassword) {
    $error = 6;
} else if (empty($_POST['email'])) {
    $error = 7;
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error = 8;
} else if (empty($_POST['department'])) {
    $error = 9;
}

if ($error == "") {


    $sql = "SELECT * FROM employee WHERE name='$name' ";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);


    if ($count < 1) {
        $sql = "INSERT INTO employee(name,password,email,department) VALUES('$name','$password','$email','$department')";
        if (mysqli_query($con, $sql)) {
            $_SESSION['msg'] = "registerd successfully";
            header("location:login.php? message=msg");
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['department']);
        }
    } else {
        $_SESSION['exist'] = "user name existed try another name";
        header("location:registration.php? existed=exist");
    }
} else {

    echo $error . $sql;
    header("location:registration.php ? error=$error");
}
