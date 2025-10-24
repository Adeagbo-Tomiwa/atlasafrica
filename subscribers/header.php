<!-- Responsive Header -->
<header class="w-full fixed top-0 left-0 z-40 bg-white/70 backdrop-blur-md border-b border-gray-100">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
    
    <!-- Logo -->
    <a href="#" class="flex items-center gap-2">
      <img src="../assets/images/atlasafrica-logo.png" alt="Atlas Africa Logo" class="w-9 h-9 object-contain">
      <span class="font-semibold text-gray-900 text-base">Atlas Africa</span>
    </a>

    <!-- Desktop Nav -->
    <nav class="hidden md:flex items-center gap-6 text-sm">
      <a href="logout.php" class="px-4 py-2 rounded-full border border-gray-300 text-sm font-medium hover:bg-gray-100 transition">logout <i class="fa-solid fa-right-from-bracket"></i></a>
    </nav>

    <!-- Mobile Menu Button -->
    <button id="menu-toggle" class="md:hidden flex flex-col gap-[5px] w-6" aria-label="Menu">
      <span class="block w-full h-[2px] bg-gray-800 rounded"></span>
      <span class="block w-full h-[2px] bg-gray-800 rounded"></span>
      <span class="block w-full h-[2px] bg-gray-800 rounded"></span>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-md">
    <nav class="flex flex-col p-4 space-y-3 text-sm">
      <a href="logout.php" class="px-4 py-2 rounded-full border border-gray-300 text-center hover:bg-gray-50 transition">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
    </nav>
  </div>
</header>

<!-- JS for mobile menu toggle -->
<script>
  const menuBtn = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
