<?php
session_start();
if (!isset($_SESSION['password'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">

        <div class="row">
            <div class="col-3">

                <?php
                include("navbar.php");
                ?>
            </div>
            <div class="col-9">
                <h4>work status details</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project_name</th>
                            <th>Date</th>
                            <th>work_status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_SESSION['user_id'];
                        $con = mysqli_connect("localhost", "root", "", "employee_management_db") or die();

                        if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {
                            $sql = "SELECT id,project_name,date,work_status FROM work_status ";
                            $cnt = 1;

                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['project_name']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['work_status']; ?></td>

                                </tr>


                            <?php
                            }
                        } else {
                            $sql = "SELECT id,project_name,date,work_status FROM work_status WHERE user_id='$id'";

                            $cnt = 1;
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                <tr>
                                    <td><?php echo  $cnt++; ?></td>
                                    <td><?php echo $row['project_name']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['work_status']; ?></td>

                                </tr>

                        <?php

                            }
                        }

                        ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</body>

</html>