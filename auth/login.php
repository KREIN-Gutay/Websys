<?php
require "../config/db.php";

/* Only run login code if form is submitted */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: ../index.php");
        exit;
    } else {
        $error = "Invalid login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="card shadow p-4" style="width:320px;">
    <h5 class="text-center mb-3">Login</h5>

    <form method="POST">
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <button class="btn btn-dark w-100">Login</button>
    </form>

    <div class="text-center mt-2">
        <small><a href="register.php">Register</a></small>
    </div>
</div>

</body>
</html>
