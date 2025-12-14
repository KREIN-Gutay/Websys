<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";
?>

<h3 class="mb-4">Admin Dashboard</h3>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Subjects</h5>
                <a href="add_subject.php" class="btn btn-primary btn-sm">Add Subject</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Prerequisites</h5>
                <a href="prerequisites.php" class="btn btn-secondary btn-sm">Assign</a>
            </div>
        </div>
    </div>
</div>

<?php require "../assets/footer.php"; ?>
<div class="col-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Users</h5>
            <a href="users.php" class="btn btn-dark btn-sm">View Users</a>
        </div>
    </div>
</div>
<a href="override_enrollment.php" class="btn btn-danger">
    Enrollment Override
</a>

<a href="subjects.php" class="btn btn-primary btn btn-secondary">
    Manage Subjects
</a>

