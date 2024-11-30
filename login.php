<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ems</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="authentication.php" method="post">
        <div class="container mt-4">
            <h2>Login form</h2>
            <div>
                <?php

                if (isset($_SESSION['msg'])) {
                    echo '<div class="alert alert-success w-25">' . htmlspecialchars($_SESSION['msg']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_SESSION['msg']);
                }

                ?>
                <?php
                if (isset($_GET['log'])) {
                    echo '<div class="alert alert-danger w-25">' . htmlspecialchars($_GET['log']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label><br>
                <input type="text" class="form-control w-25" name="name" value="">

            </div>
            <div class="mb-3">
                <label for="password" class="form=label">Password</label><br>
                <input type="password" class="form-control w-25" name="password" value="">
            </div>

            <div class="mb-3">
                <button input type="submit" class="btn btn-primary">login</button>
            </div>
            <div>
                create account <a href="registration.php">Register</a>
            </div>

    </form>

</body>

</html>