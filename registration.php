<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    <form action="insert.php" method="post">

        <div class="container mt-4">
            <?php
            if (isset($_SESSION['exist'])) {
                echo '<div class="alert alert-danger w-25">' . htmlspecialchars($_SESSION['exist']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            unset($_SESSION['exist']);
            ?>

            <?php

            if (isset($_GET['pass'])) {
                echo '<div class="alert alert-danger w-25">' . htmlspecialchars($_GET['pass']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            ?>
            <h2>Registration form</h2>

            <?php
            include("errors.php");

            ?>

            <div class="mb-3">
                <label for="name" class="form-label">Enter the name</label>
                <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form=label">Enter the password</label><br>
                <input type="password" class="form-control w-25" name="password" value="">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form=label">confirm password</label><br>
                <input type="password" class="form-control w-25" name="confirmPassword" value="">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Enter the email</label>
                <input type="email" class="form-control w-25" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">

            </div>
            <div class="mb-3">
                <select class="form-control w-25" name="department">
                    <?php
                    $dep = isset($_SESSION['department']) ? $_SESSION['department'] : '';
                    if ($dep) {
                    ?>

                        <option value="<?php echo  $dep; ?> "><?php echo  $dep; ?></option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Account">Account</option>
                        <option value="Marketing">Marketing</option>
                    <?php
                    } else {
                    ?>
                        <option value="">select department</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Account">Account</option>
                        <option value="Marketing">Marketing</option>

                </select>
            <?php
                    }
            ?>


            <div class="mt-3">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>
            <div>
                Already have account <a href="login.php">login</a>
            </div>
            </div>
    </form>

</body>

</html>