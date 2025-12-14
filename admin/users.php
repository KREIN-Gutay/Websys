<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

if ($_SESSION['role'] !== 'admin') {
    die("Admins only");
}

/* ALWAYS define $users */
$stmt = $pdo->query("
    SELECT id, role, first_name, last_name, email, profile_picture, signature_image
    FROM users
    ORDER BY role
");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h3 class="mb-3">User Management</h3>
<a href="dashboard.php" class="btn btn-secondary mb-3">
    ← Back to Admin Dashboard
</a>


<?php if (empty($users)): ?>
    <div class="alert alert-warning">No users found.</div>
<?php else: ?>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>Role</th>
            <th>Name</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th>Signature</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $u): ?>
        <tr>
            <td><?= ucfirst($u['role']) ?></td>
            <td><?= $u['first_name'] . " " . $u['last_name'] ?></td>
            <td><?= $u['email'] ?></td>
            <td>
                <img src="<?= $u['profile_picture'] ?>" width="60">
            </td>
            <td>
                <img src="<?= $u['signature_image'] ?>" width="100">
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>

<?php require "../assets/footer.php"; ?>
