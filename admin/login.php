<?php session_start(); ?>
<?php include "./functions/db_connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "./includes/head.php"; ?>
  <title>Admin Login — Atlas Africa</title>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-white to-gray-100 px-4">

  <!-- Outer Wrapper (Center Alignment) -->
  <div class="flex flex-col items-center justify-center w-full">
    
    <!-- Login Container -->
    <div class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 md:p-10 overflow-hidden">

      <!-- Decorative Gradient Overlay -->
      <div class="absolute inset-0 pointer-events-none bg-gradient-to-br from-[#D9C993]/20 via-transparent to-[#0A174E]/10 rounded-2xl"></div>

      <!-- Logo & Heading -->
      <div class="relative flex flex-col items-center mb-8">
        <img src="../assets/images/atlasafrica-logo.png" alt="Atlas Africa Logo" class="w-16 h-16 mb-3 drop-shadow-md">
        <h2 class="text-2xl md:text-3xl font-bold text-[#0A174E]">Atlas Africa Admin</h2>
        <p class="text-gray-500 text-sm mt-1">Sign in to access your dashboard</p>
      </div>

      <!-- Error Message -->
      <?php if (isset($_SESSION['error'])): ?>
        <div class="relative bg-red-50 border border-red-200 text-red-700 text-sm p-3 rounded-lg mb-4 text-center shadow-sm">
          <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
      <?php endif; ?>

      <!-- Login Form -->
      <form action="./functions/login.php" method="POST" class="space-y-5 relative">
        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input 
            type="email" 
            name="email" 
            required
            placeholder="admin@atlasafrica.com"
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#0A174E] focus:border-[#0A174E] outline-none transition-all text-gray-800 placeholder-gray-400"
          >
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input 
            type="password" 
            name="password" 
            required
            placeholder="••••••••"
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#0A174E] focus:border-[#0A174E] outline-none transition-all text-gray-800 placeholder-gray-400"
          >
        </div>

        <!-- Remember Me / Forgot Password -->
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="remember" class="accent-[#0A174E]">
            <span class="text-gray-600">Remember me</span>
          </label>
          <a href="#" class="text-[#0A174E] hover:text-[#122A80] font-medium transition-all">Forgot Password?</a>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit" 
          name="login"
          class="w-full py-2.5 bg-[#0A174E] text-white rounded-lg font-semibold hover:bg-[#122A80] transition-all shadow-md hover:shadow-lg"
        >
          Sign In
        </button>
      </form>

      <!-- Footer Text -->
      <p class="text-center text-xs text-gray-500 mt-6 relative">
        © <?php echo date("Y"); ?> Atlas Africa. All Rights Reserved.
      </p>
    </div>
  </div>

</body>
</html>
