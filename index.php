<?php
require "config/db.php";

if (!isset($_SESSION['role'])) {
    header("Location: auth/login.php");
}

if ($_SESSION['role'] === 'admin') {
    header("Location: admin/dashboard.php");
}
if ($_SESSION['role'] === 'student') {
    header("Location: student/dashboard.php");
}
if ($_SESSION['role'] === 'faculty') {
    header("Location: faculty/dashboard.php");
}
