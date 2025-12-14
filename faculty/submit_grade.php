<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

if ($_SESSION['role'] !== 'faculty') {
    die("Faculty only");
}

/* GET ALL ACTIVE ENROLLMENTS */
$stmt = $pdo->query("
    SELECT 
        e.id AS enrollment_id,
        u.first_name,
        u.last_name,
        s.subject_name
    FROM enrollments e
    JOIN users u ON e.student_id = u.id
    JOIN subjects s ON e.subject_id = s.id
    WHERE e.status = 'enrolled'
");

$enrollments = $stmt->fetchAll();
?>

<h4>Submit Grade</h4>

<?php if (empty($enrollments)): ?>
    <div class="alert alert-warning">
        No enrolled students yet.
    </div>
<?php else: ?>

<form method="POST" class="card p-4 shadow-sm col-md-6">

    <label class="form-label">Enrollment</label>
    <select name="enrollment_id" class="form-select mb-3" required>
        <option value="">-- Select Student --</option>
        <?php foreach ($enrollments as $e): ?>
            <option value="<?= $e['enrollment_id'] ?>">
                <?= $e['first_name'] ?> <?= $e['last_name'] ?> — <?= $e['subject_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input class="form-control mb-3" name="grade" placeholder="Grade" required>

    <button class="btn btn-success">Submit</button>
</form>

<?php endif; ?>

<?php
/* SUBMIT GRADE */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $pdo->prepare("
        INSERT INTO grades (enrollment_id, faculty_id, grade)
        VALUES (?, ?, ?)
    ")->execute([
        $_POST['enrollment_id'],
        $_SESSION['user_id'],
        $_POST['grade']
    ]);

    $pdo->prepare("
        UPDATE enrollments
        SET status = 'completed'
        WHERE id = ?
    ")->execute([$_POST['enrollment_id']]);

    echo "<div class='alert alert-success mt-3'>Grade submitted</div>";
}

require "../assets/footer.php";
