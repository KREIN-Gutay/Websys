<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM subjects WHERE id = ?");
$stmt->execute([$id]);
$subject = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stmt = $pdo->prepare("
        UPDATE subjects
        SET subject_code = ?, subject_name = ?, units = ?
        WHERE id = ?
    ");
    $stmt->execute([
        $_POST['code'],
        $_POST['name'],
        $_POST['units'],
        $id
    ]);

    header("Location: subjects.php");
    exit;
}
?>

<h4>Edit Subject</h4>

<form method="POST" class="card p-4 col-md-6">
    <input name="code" class="form-control mb-2"
           value="<?= $subject['subject_code'] ?>" required>

    <input name="name" class="form-control mb-2"
           value="<?= $subject['subject_name'] ?>" required>

    <input name="units" class="form-control mb-3"
           value="<?= $subject['units'] ?>" required>

    <button class="btn btn-primary">Update</button>
    <a href="subjects.php" class="btn btn-secondary">Cancel</a>
</form>

<?php require "../assets/footer.php"; ?>
