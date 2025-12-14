<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

$students = $pdo->query("SELECT id, first_name, last_name FROM users WHERE role='student'")->fetchAll();
$subjects = $pdo->query("SELECT id, subject_name FROM subjects")->fetchAll();
?>

<h4>Enrollment Override</h4>

<h4>Assign Prerequisite</h4><a href="dashboard.php" class="btn btn-secondary mb-3">
    ← Back to Admin Dashboard
</a>
<form method="POST" class="card p-4 col-md-6">

    <label>Student</label>
    <select name="student_id" class="form-select mb-3" required>
        <?php foreach ($students as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['first_name']." ".$s['last_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Subject</label>
    <select name="subject_id" class="form-select mb-3" required>
        <?php foreach ($subjects as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['subject_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-danger">Override Enroll</button>
</form>

<?php
if ($_POST) {
    $pdo->prepare("
        INSERT INTO enrollments (student_id, subject_id, status)
        VALUES (?, ?, 'enrolled')
    ")->execute([
        $_POST['student_id'],
        $_POST['subject_id']
    ]);

    echo "<div class='alert alert-success mt-3'>Enrollment overridden</div>";
}

require "../assets/footer.php";
