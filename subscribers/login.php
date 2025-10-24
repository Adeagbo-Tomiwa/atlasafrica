<?php
session_start();

$admin_user = 'admin@atlasafrica.org';
$admin_pass = 'atlas123'; // Change this as needed

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #0A174E 0%, #111C5E 60%, #182C88 100%);
    }
    .glass {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
  </style>
</head>

<body class="flex items-center justify-center min-h-screen text-white font-[Inter,sans-serif] px-4">
  <div class="glass w-full max-w-sm p-8 rounded-2xl shadow-2xl">
    <!-- Logo -->
    <div class="flex flex-col items-center mb-6">
      <img src="../assets/images/atlasafrica-logo.png" alt="Atlas Africa Logo" class="w-14 mb-2">
      <h1 class="text-2xl font-bold tracking-tight text-[#F5D042]">Atlas Africa</h1>
      <p class="text-sm text-gray-200 mt-1">Admin Access Portal</p>
    </div>

    <!-- Error Message -->
    <?php if (!empty($error)): ?>
      <p class="text-red-400 text-sm mb-4 text-center bg-red-900/40 py-2 rounded-lg"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <!-- Login Form -->
    <form method="POST" class="space-y-5">
      <div>
        <label class="block text-sm text-gray-200 mb-1">Username</label>
        <input type="text" name="username" required
          class="w-full px-4 py-3 rounded-lg text-gray-900 bg-white border border-gray-200 focus:ring-2 focus:ring-[#F5D042] outline-none transition-all" />
      </div>
      <div>
        <label class="block text-sm text-gray-200 mb-1">Password</label>
        <input type="password" name="password" required
          class="w-full px-4 py-3 rounded-lg text-gray-900 bg-white border border-gray-200 focus:ring-2 focus:ring-[#F5D042] outline-none transition-all" />
      </div>
      <button type="submit"
        class="w-full py-3 rounded-lg bg-[#F5D042] text-[#0A174E] font-semibold hover:bg-[#e2bf35] active:scale-[0.98] transition">
        Sign In
      </button>
    </form>

    <!-- Footer -->
    <p class="text-center text-xs text-gray-300 mt-6">© <?= date('Y') ?> Atlas Africa. All rights reserved.</p>
  </div>
</body>
</html>
