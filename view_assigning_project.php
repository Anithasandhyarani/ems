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
                <h4>Employee work assign details</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>employee name</th>
                            <th>Project name</th>
                            <th>End date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_SESSION['user_id'];
                        $NAME = $_SESSION['name'];
                        $con = mysqli_connect("localhost", "root", "", "employee_management_db") or die();

                        if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {
                            $sql = "SELECT id,name,project_name,end_date FROM work_assign ";
                            $cnt = 1;

                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['project_name']; ?></td>
                                    <td><?php echo $row['end_date']; ?></td>


                                </tr>


                            <?php
                            }
                        } else {


                            $sql = "SELECT id,name,project_name,end_date FROM work_assign WHERE name='$NAME'";

                            $cnt = 1;
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['project_name']; ?></td>
                                    <td><?php echo $row['end_date']; ?></td>

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