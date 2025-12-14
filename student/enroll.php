<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

// get all subjects
$subjects = $pdo->query("SELECT * FROM subjects")->fetchAll();
?>

<h4>Enroll Subject</h4>

<form method="POST" class="card p-4 shadow-sm col-md-6">

    <label class="form-label">Select Subject</label>

    <select name="subject_id" class="form-select mb-3" required>
        <option value="">-- Select Subject --</option>
        <?php foreach ($subjects as $sub): ?>
            <option value="<?= $sub['id'] ?>">
                <?= $sub['subject_code'] ?> - <?= $sub['subject_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-success">Enroll</button>
</form>

<?php
/* ENROLL LOGIC */
if ($_POST) {

    $student_id = $_SESSION['user_id'];
    $subject_id = $_POST['subject_id'];

    // check prerequisite
    $stmt = $pdo->prepare("
        SELECT pr.prerequisite_id
        FROM pre_req pr
        LEFT JOIN enrollments e
          ON pr.prerequisite_id = e.subject_id
          AND e.student_id = ?
          AND e.status = 'completed'
        WHERE pr.subject_id = ?
          AND e.id IS NULL
    ");
    $stmt->execute([$student_id, $subject_id]);

    if ($stmt->rowCount() > 0) {
        echo "<div class='alert alert-danger mt-3'>
                ❌ Prerequisite not completed
              </div>";
    } else {

        $stmt = $pdo->prepare("
            INSERT INTO enrollments (student_id, subject_id)
            VALUES (?, ?)
        ");
        $stmt->execute([$student_id, $subject_id]);

        echo "<div class='alert alert-success mt-3'>
                ✅ Enrollment successful
              </div>";
    }
}

require "../assets/footer.php";
