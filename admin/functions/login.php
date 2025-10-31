<?php
session_start();
include "./db_connect.php";

if (isset($_POST['login'])) {
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  $sql = "SELECT * FROM admins WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();
    if (password_verify($password, $admin['password'])) {
      $_SESSION['admin_id'] = $admin['id'];
      $_SESSION['admin_name'] = $admin['full_name'];
      header("Location: ../dashboard.php");
      exit();
    } else {
      $_SESSION['error'] = "Invalid password.";
    }
  } else {
    $_SESSION['error'] = "No account found with this email.";
  }

  header("Location: ../login.php");
  exit();
}
?>
