<?php
if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {

?>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Home </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    employee management
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="add_employee.php">add employee</a></li>
                    <li><a class="dropdown-item" href="view_employee.php">view employee</a></li>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_leave.php">leave manage</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    project status
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="assign_project.php">assigning project</a></li>
                    <li><a class="dropdown-item" href="view_assigning_project.php">view assigning project</a></li>
                    <li><a class="dropdown-item" href="view_status.php">employee project status</a></li>

                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
            </li>
        </ul>
    </nav>

<?php
} else {
?>

    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Home </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    work status
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="work_status.php">Work status</a></li>
                    <li><a class="dropdown-item" href="view_status.php">view status</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    manage leave
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="leave.php">apply leave</a></li>
                    <li><a class="dropdown-item" href="employee_view_leave.php">view leave</a></li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_assigning_project.php">Assigned work</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
            </li>
        </ul>
    </nav>
<?php
}

?>