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
    <title>leave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="leave_insert.php" method="post">
        <div class="container mt-4">
            <div class="row">
                <div class="col-3">
                    <?php
                    include("navbar.php");
                    ?>
                </div>
                <div class="col-9">
                    <h2>Apply leave</h2>

                    <?php
                    include("errors.php");

                    if (isset($_SESSION['leav'])) {
                        echo '<div class="alert alert-success w-25">' . htmlspecialchars($_SESSION['leav']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_SESSION['leav']);
                    }
                    $Sdate = isset($_SESSION['startdate']) ? $_SESSION['startdate'] : '';
                    $Edate = isset($_SESSION['startdate']) ? $_SESSION['startdate'] : '';

                    ?>
                    <div class="mb-3">
                        <label for="leave type" class="form-label">Leave type</label>
                        <select class="form-control w-25" name="type">
                            <?php
                            $type = isset($_SESSION['type']) ? $_SESSION['type'] : '';
                            if ($type) {

                            ?>

                                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                <option value="cl">cl</option>
                                <option value="sl">sl</option>
                                <option value="hpl">hpl</option>
                                <option value="others">others</option>
                            <?php
                            } else {

                            ?>

                                <option value="">select leave type</option>
                                <option value="cl">cl</option>
                                <option value="sl">sl</option>
                                <option value="hpl">hpl</option>
                                <option value="others">others</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="leave category" class="form-label">Leave category</label>
                        <select class="form-control w-25" name="category">

                            <?php
                            $category = isset($_SESSION['category']) ? $_SESSION['category'] : '';
                            if ($category) {

                            ?>
                                <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                <option value="fullday">fullday</option>
                                <option value="halfday">halfday</option>
                            <?php
                            } else {
                            ?>
                                <option value="">select leave category </option>
                                <option value="fullday">fullday</option>
                                <option value="halfday">halfday</option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div label for="date" class="form-label">Start date</label>
                            <input type="date" class="form-control w-25" name="startdate" value="<?php echo  htmlspecialchars($Edate); ?>">
                        </div>
                    </div>

                    <div class=" mb-3">
                        <div label for="date" class="form-label">End date</label>
                            <input type="date" class="form-control w-25" name="enddate" value="<?php echo  htmlspecialchars($Sdate); ?>">
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control w-50" rows="5" name="remarks" id="remarks"><?php echo isset($_SESSION['remarks']) ? $_SESSION['remarks'] : '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <div>
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
    </form>


</body>

</html>