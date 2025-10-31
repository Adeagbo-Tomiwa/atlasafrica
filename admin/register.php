<?php session_start(); ?>
<?php include "./functions/db_connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "./includes/head.php"; ?>
  <title>Register Admin — Atlas Africa</title>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-white to-gray-100 px-4">

  <!-- Outer Wrapper -->
  <div class="flex flex-col items-center justify-center w-full">
    
    <!-- Registration Container -->
    <div class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 md:p-10 overflow-hidden">

      <!-- Decorative Overlay -->
      <div class="absolute inset-0 pointer-events-none bg-gradient-to-br from-[#D9C993]/20 via-transparent to-[#0A174E]/10 rounded-2xl"></div>

      <!-- Logo & Heading -->
      <div class="relative flex flex-col items-center mb-8">
        <img src="../assets/images/atlasafrica-logo.png" alt="Atlas Africa Logo" class="w-16 h-16 mb-3 drop-shadow-md">
        <h2 class="text-2xl md:text-3xl font-bold text-[#0A174E]">Create Admin Account</h2>
        <p class="text-gray-500 text-sm mt-1">Register a new administrator for Atlas Africa</p>
      </div>

      <!-- Error / Success Message -->
      <?php if (isset($_SESSION['message'])): ?>
        <div class="relative bg-green-50 border border-green-200 text-green-700 text-sm p-3 rounded-lg mb-4 text-center shadow-sm">
          <?= $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
      <?php elseif (isset($_SESSION['error'])): ?>
        <div class="relative bg-red-50 border border-red-200 text-red-700 text-sm p-3 rounded-lg mb-4 text-center shadow-sm">
          <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
      <?php endif; ?>

      <!-- Registration Form -->
      <form action="./functions/register.php" method="POST" class="space-y-5 relative">
        
        <!-- Full Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
          <input 
            type="text" 
            name="fullname" 
            required
            placeholder="John Doe"
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#0A174E] focus:border-[#0A174E] outline-none transition-all text-gray-800 placeholder-gray-400"
          >
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
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

        <!-- Role -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
          <select name="role" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 bg-white focus:ring-2 focus:ring-[#0A174E] focus:border-[#0A174E] outline-none transition-all text-gray-800">
            <option value="Super Admin">Super Admin</option>
            <option value="Editor">Editor</option>
            <option value="Moderator">Moderator</option>
          </select>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit" 
          name="register"
          class="w-full py-2.5 bg-[#0A174E] text-white rounded-lg font-semibold hover:bg-[#122A80] transition-all shadow-md hover:shadow-lg"
        >
          Register Admin
        </button>
      </form>

      <!-- Redirect Link -->
      <p class="text-center text-sm text-gray-600 mt-6 relative">
        Already have an account?
        <a href="./login.php" class="text-[#0A174E] hover:text-[#122A80] font-medium">Sign In</a>
      </p>

      <!-- Footer -->
      <p class="text-center text-xs text-gray-500 mt-4 relative">
        © <?php echo date("Y"); ?> Atlas Africa. All Rights Reserved.
      </p>
    </div>
  </div>

</body>
</html>
