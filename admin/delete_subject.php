<?php
require "../config/db.php";
require "../config/auth_check.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM subjects WHERE id = ?");
$stmt->execute([$id]);

header("Location: subjects.php");
exit;
