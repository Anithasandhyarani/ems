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
                <h4>leave status</h4>
                <?php

                if (isset($_GET['acc'])) {
                    echo '<div class="alert alert-success w-25">' . htmlspecialchars($_GET['acc']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }

                ?>
                <?php

                if (isset($_GET['rej'])) {
                    echo '<div class="alert alert-danger w-25">' . htmlspecialchars($_GET['rej']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }

                ?>


                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>leave type</th>
                            <th>leave category</th>
                            <th>start date</th>
                            <th>end date</th>
                            <th>description</th>
                            <th>status</th>




                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "employee_management_db") or die();
                        $sql = "SELECT id,type,category,startdate,enddate,remarks,status FROM employee_leave";

                        $cnt = 1;
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <tr>
                                <td><?php echo $cnt++;  ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['startdate']; ?></td>
                                <td><?php echo $row['enddate']; ?></td>
                                <td><?php echo $row['remarks']; ?></td>
                                <td><?php
                                    if ($row['status'] == 1) {
                                        echo '<span style="color: green;">Accepted</span>';
                                    } else if ($row['status'] == 0) {
                                        echo '<span style="color: orange;">Pending</span>';
                                    } else {
                                        echo '<span style="color: red;">Rejected</span>';
                                    }
                                    ?></td>



                            </tr>


                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</body>

</html>