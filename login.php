<?php
session_start();

$admin_user = 'admin';
$admin_pass = 'atlas123'; // You can change this

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if ($user === $admin_user && $pass === $admin_pass) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login — Atlas Africa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
    <h1 class="text-2xl font-bold text-center text-[#0A174E] mb-6">Admin Login</h1>
    <?php if (!empty($error)): ?>
      <p class="text-red-500 text-sm mb-4 text-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST">
      <label class="block mb-3">
        <span class="text-sm text-gray-600">Username</span>
        <input type="text" name="username" required class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring focus:ring-[#F5D042]/40" />
      </label>
      <label class="block mb-4">
        <span class="text-sm text-gray-600">Password</span>
        <input type="password" name="password" required class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring focus:ring-[#F5D042]/40" />
      </label>
      <button type="submit" class="w-full bg-[#0A174E] text-white py-2 rounded-lg hover:bg-[#13268a] transition">Login</button>
    </form>
  </div>
</body>
</html>
