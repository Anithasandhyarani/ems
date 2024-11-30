<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error</title>
</head>

<body>
    <div style="color:red;font-size:14px">

        <?php
        $error['registration'] = [
            0 => "",
            1 => "name is required",
            2 => "Name should be two letters and not contains special characters",
            3 => "password is required",

            4 => "password minimum length should be 8,
at least one uppercase letter,
& lowercase letter,
and one digit. ",
            5 => "confirm password is required",
            6 => "password not matched",
            7 => "email is required",
            8 => "emain must have @ and valid domain name",
            9 => "Department is required",

        ];
        $error_number = $_GET['error'] ?? 0;
        echo $error['registration'][$error_number];




        $error["add_employee"] = [
            0 => "",
            1 => "name is required",
            2 => "Name should be two letters and one space between words,not contains special characters",
            3 => "password is required",

            4 => "password minimum length should be 8,
at least one uppercase letter,
& lowercase letter,
and one digit. ",
            5 => "confirm password is required",
            6 => "password not matched",
            7 => "email is required",
            8 => "emain must have @ and valid domain name",
            9 => "Department is required",

        ];
        $error_number = $_GET['employee_error'] ?? 0;
        echo $error["add_employee"][$error_number];


        $error['leave'] = [
            0 => "",
            1 => "leave type is required",
            2 => "leave category is required",
            3 => "start date is required",
            4 => "end date is required",
            5 => "Remarks is required"
        ];
        $error_number = $_GET["leave_error"] ?? 0;
        echo $error['leave'][$error_number];

        $error['status'] = [
            0 => "",
            1 => "project name is required",
            2 => "Only letters and white space allowed for project name",
            3 => "date is required",
            4 => "work status is required"
        ];
        $error_number = $_GET["workError"] ?? 0;
        echo $error['status'][$error_number];

        $error['assign_project'] = [
            0 => "",
            1 => "name is required",
            2 => "Name should be two letters and one space between words,not contains special characters",
            3 => "project name is required",
            4 => "Only letters and white space allowed for project name",
            5 => "date is required"

        ];
        $error_number = $_GET["assign_error"] ?? 0;
        echo $error['assign_project'][$error_number];
        ?>
    </div>
</body>

</html>