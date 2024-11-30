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
    <title>Work status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="assign_insert_project.php" method="post">

        <div class="container mt-4">

            <div class="row">
                <div class="col-3">
                    <?php
                    include("navbar.php");
                    ?>
                </div>
                <div class="col-9">
                    <h2>Assign project </h2>

                    <?php

                    include("errors.php");

                    if (isset($_SESSION['sta'])) {
                        echo '<div class="alert alert-success w-25">' . htmlspecialchars($_SESSION['sta']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_SESSION['sta']);
                    }
                    $dateValue = isset($_SESSION['date']) ? $_SESSION['date'] : '';
                    ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Employee name</label>
                        <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="project name" class="form-label">Project name</label>
                        <input type="text" class="form-control w-25" name="project" value="<?php echo isset($_SESSION['project']) ? $_SESSION['project'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">End date</label>
                        <input type="date" class="form-control w-25" name="date" id="date" value="<?php echo  htmlspecialchars($dateValue); ?>">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>