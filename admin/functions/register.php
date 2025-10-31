<?php
session_start();
include "db_connect.php";

if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Check for duplicate email
    $check = $conn->prepare("SELECT id FROM admins WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $_SESSION['error'] = "Email already registered!";
        header("Location: ../register.php");
        exit();
    }

    // Insert new admin
    $stmt = $conn->prepare("INSERT INTO admins (full_name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $password, $role);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Admin registered successfully!";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: ../register.php");
        exit();
    }
}
?>
