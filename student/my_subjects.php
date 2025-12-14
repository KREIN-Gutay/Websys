<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

$stmt = $pdo->prepare("
    SELECT s.subject_code, s.subject_name, e.status
    FROM enrollments e
    JOIN subjects s ON e.subject_id = s.id
    WHERE e.student_id = ?
");
$stmt->execute([$_SESSION['user_id']]);
?>

<h4>My Subjects</h4>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Code</th>
            <th>Subject</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stmt as $row): ?>
        <tr>
            <td><?= $row['subject_code'] ?></td>
            <td><?= $row['subject_name'] ?></td>
            <td><?= ucfirst($row['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require "../assets/footer.php"; ?>
