<?php
require "../config/db.php";
require "../config/auth_check.php";
require "../assets/header.php";

$subjects = $pdo->query("SELECT * FROM subjects")->fetchAll();
?>

<h4>Assign Prerequisite</h4><a href="dashboard.php" class="btn btn-secondary mb-3">
    ← Back to Admin Dashboard
</a>


<form method="POST" class="card p-4 shadow-sm col-md-6">

    <label>Main Subject</label>
    <select name="subject_id" class="form-select mb-3" required>
        <?php foreach ($subjects as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['subject_code'] ?> - <?= $s['subject_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Prerequisite Subject</label>
    <select name="prerequisite_id" class="form-select mb-3" required>
        <?php foreach ($subjects as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['subject_code'] ?> - <?= $s['subject_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-primary">Assign</button>
</form>

<?php
if ($_POST) {
    $stmt = $pdo->prepare("
        INSERT INTO pre_req (subject_id, prerequisite_id)
        VALUES (?, ?)
    ");
    $stmt->execute([$_POST['subject_id'], $_POST['prerequisite_id']]);

    echo "<div class='alert alert-success mt-3'>Prerequisite Assigned</div>";
}

require "../assets/footer.php";
