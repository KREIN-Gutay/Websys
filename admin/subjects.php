<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

$subjects = $pdo->query("SELECT * FROM subjects")->fetchAll();
?>

<h4>Manage Subjects</h4>

<a href="add_subject.php" class="btn btn-success mb-3">Add Subject</a>
<a href="dashboard.php" class="btn btn-secondary mb-3">Back</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Units</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($subjects as $s): ?>
        <tr>
            <td><?= $s['subject_code'] ?></td>
            <td><?= $s['subject_name'] ?></td>
            <td><?= $s['units'] ?></td>
            <td>
                <a href="edit_subject.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="delete_subject.php?id=<?= $s['id'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Are you sure you want to delete this subject?')">
                    Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require "../assets/footer.php"; ?>
