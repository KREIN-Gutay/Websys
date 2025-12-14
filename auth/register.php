<?php
require "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // create unique file names
    $profile_name = time() . "_" . $_FILES['profile']['name'];
    $signature_name = time() . "_" . $_FILES['signature']['name'];

    // file paths
    $profile_path = "../uploads/profiles/" . $profile_name;
    $signature_path = "../uploads/signatures/" . $signature_name;

    // move uploaded files
    move_uploaded_file($_FILES['profile']['tmp_name'], $profile_path);
    move_uploaded_file($_FILES['signature']['tmp_name'], $signature_path);

    // insert user
    $stmt = $pdo->prepare("
        INSERT INTO users 
        (role, first_name, last_name, email, password, profile_picture, signature_image)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $_POST['role'],
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        $profile_path,
        $signature_path
    ]);

   // echo "<p style='color:green'>User registered successfully</p>";
    header("Location: login.php");
exit;

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="card shadow p-4" style="width:360px;">
    <h5 class="text-center mb-3">Register</h5>

    <form method="POST" enctype="multipart/form-data">
        <input name="first_name" class="form-control mb-2" placeholder="First Name" required>
        <input name="last_name" class="form-control mb-2" placeholder="Last Name" required>
        <input name="email" type="email" class="form-control mb-2" placeholder="Email" required>
        <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>

        <select name="role" class="form-select mb-2" required>
            <option value="">Role</option>
            <option value="student">Student</option>
            <option value="faculty">Faculty</option>
            <option value="admin">Admin</option>
        </select>

        <input type="file" name="profile" class="form-control mb-2" required>
        <input type="file" name="signature" class="form-control mb-3" required>

        <button class="btn btn-dark w-100">Register</button>
    </form>

    <div class="text-center mt-2">
        <small><a href="login.php">Back to Login</a></small>
    </div>
</div>

</body>
</html>
