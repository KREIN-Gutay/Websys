<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

$stmt = $pdo->prepare("
    SELECT first_name, last_name, profile_picture, signature_image
    FROM users WHERE id = ?
");
$stmt->execute([$_GET['id']]);
$s = $stmt->fetch();
?>

<h4>Student Profile</h4>

<div class="card p-4 col-md-6">
    <p><strong>Name:</strong> <?= $s['first_name']." ".$s['last_name'] ?></p>

    <p><strong>Profile Picture:</strong></p>
    <img src="<?= $s['profile_picture'] ?>" width="150" class="mb-3">

    <p><strong>Signature:</strong></p>
    <img src="<?= $s['signature_image'] ?>" width="250">
</div>

<?php require "../assets/footer.php"; ?>
