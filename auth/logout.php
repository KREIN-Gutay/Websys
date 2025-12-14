
<?php
session_start();        // start session
session_unset();        // remove all session variables
session_destroy();      // destroy session

header("Location: login.php");
exit;


/*
require "../config/db.php";

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$_POST['email']]);
$user = $stmt->fetch();

if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    header("Location: ../index.php");
} else {
    echo "Invalid login";
}/*/

?>
