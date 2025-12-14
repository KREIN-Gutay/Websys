<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";
?>

<h3>Student Dashboard</h3>

<div class="card shadow-sm col-md-6">
    <div class="card-body">
        <h5 class="card-title">Enrollment</h5>
        <a href="enroll.php" class="btn btn-primary">Enroll Subject</a>
    </div>
</div>

<?php require "../assets/footer.php"; ?>
