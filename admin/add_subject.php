<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";
?>

<h4>Add Subject</h4>
<a href="dashboard.php" class="btn btn-secondary mb-3">
    ← Back to Admin Dashboard
</a>

<form method="POST" class="card p-4 shadow-sm col-md-6">

    <input class="form-control mb-2" name="code" placeholder="Subject Code" required>
    <input class="form-control mb-2" name="name" placeholder="Subject Name" required>
    <input class="form-control mb-2" name="units" placeholder="Units" required>

    <button class="btn btn-success">Save</button>
</form>

<?php
if ($_POST) {
    $stmt = $pdo->prepare("
        INSERT INTO subjects (subject_code, subject_name, units)
        VALUES (?, ?, ?)
    ");
    $stmt->execute([$_POST['code'], $_POST['name'], $_POST['units']]);
    echo "<div class='alert alert-success mt-3'>Subject Added</div>";
}
require "../assets/footer.php";
