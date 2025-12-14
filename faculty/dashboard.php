<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

if ($_SESSION['role'] !== 'faculty') {
    die("Faculty only");
}
?>

<h3 class="mb-4">Faculty Dashboard</h3>

<div class="row g-3">

    <!-- Class List -->
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h5>Class List</h5>
            <a href="class_list.php" class="btn btn-primary btn-sm mt-2">
                View Class List
            </a>
        </div>
    </div>

    <!-- Submit Grades -->
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h5>Grades</h5>
            <a href="submit_grade.php" class="btn btn-success btn-sm mt-2">
                Submit Grades
            </a>
        </div>
    </div>

</div>

<?php require "../assets/footer.php"; ?>
