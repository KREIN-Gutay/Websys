<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

$subjects = $pdo->query("SELECT * FROM subjects")->fetchAll();
?>

<h4>Class List</h4>

<form method="GET" class="mb-4 col-md-6">
    <select name="subject_id" class="form-select" required>
        <option value="">-- Select Subject --</option>
        <?php foreach ($subjects as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['subject_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button class="btn btn-primary mt-2">View</button>
</form>

<?php
if (isset($_GET['subject_id'])) {

    $stmt = $pdo->prepare("
        SELECT u.id, u.first_name, u.last_name
        FROM enrollments e
        JOIN users u ON e.student_id = u.id
        WHERE e.subject_id = ?
    ");
    $stmt->execute([$_GET['subject_id']]);
?>

<table class="table table-bordered">
    <tr><th>Name</th><th>Profile</th></tr>
    <?php foreach ($stmt as $row): ?>
    <tr>
        <td><?= $row['first_name']." ".$row['last_name'] ?></td>
        <td>
            <a href="student_profile.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">
                View Profile
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php } ?>

<?php require "../assets/footer.php"; ?>
