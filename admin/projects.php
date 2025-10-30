<!-- HEAD -->
<?php include "./includes/head.php"; ?>

<!-- Top Navigation Bar -->
<?php include "./includes/top-nav.php"; ?>

<div class="flex">
  <!-- Sidebar -->
  <?php include "./includes/aside.php"; ?>

  <!-- Main Content -->
  <main class="flex-1 p-6 lg:p-8 lg:ml-64 overflow-x-hidden">
    <!-- Header -->
    <div class="mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
          <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-2">
            Projects
          </h1>
          <p class="text-gray-600 dark:text-gray-400">Manage and track all your creative projects</p>
        </div>
        <button id="openCreateModal" 
          class="gradient-gold text-[#0A174E] px-6 py-3 rounded-xl font-semibold hover:shadow-xl transition-all flex items-center justify-center space-x-2">
          <i class="fas fa-plus"></i>
          <span>New Project</span>
        </button>
      </div>
    </div>

    <!-- Summary Cards -->
    <?php include "./functions/projects-stats.php"; ?>

    <!-- Filter Tabs & View Toggle -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 shadow-lg border border-gray-100 dark:border-gray-700 mb-6">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex space-x-6 overflow-x-auto">
          <button class="tab-active px-4 py-2 text-sm font-semibold whitespace-nowrap">All Projects</button>
          <button class="px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white whitespace-nowrap">In Progress</button>
          <button class="px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white whitespace-nowrap">Completed</button>
          <button class="px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white whitespace-nowrap">On Hold</button>
        </div>
        <div class="flex items-center space-x-2">
          <button onclick="setView('grid')" id="gridBtn" class="p-2 bg-[#0A174E] text-white rounded-lg transition">
            <i class="fas fa-th-large"></i>
          </button>
          <button onclick="setView('list')" id="listBtn" class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
            <i class="fas fa-list"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Grid View -->
    <div id="gridView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php include "./functions/projects-grid.php"; ?>
    </div>

    <!-- List View -->
    <div id="listView" class="hidden">
      <?php include "./functions/projects-list.php"; ?>
    </div>



<!-- Modal Overlay -->
<div id="createModal" 
  class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 px-4 sm:px-0 overflow-y-auto">
  
  <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg sm:max-w-md md:max-w-lg lg:max-w-xl mt-10 mb-10 p-6 sm:p-8 relative animate-fadeIn">
    
    <!-- Close Button -->
    <button id="closeCreateModal" 
      class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
    
    <!-- Modal Title -->
    <h2 class="text-xl sm:text-2xl font-semibold text-[#0A174E] mb-4 text-center">Create New Project</h2>

    <!-- Form -->
    <form action="./functions/create-project.php" method="POST" enctype="multipart/form-data" class="space-y-4">

    <div class="flex gap-5 items-center">
        <!-- Project Name -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Project Name</label>
        <input type="text" name="project_name" required 
          class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-[#0A174E] focus:border-transparent">
      </div>

      <!-- Category -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Category</label>
        <select name="category" required 
          class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-[#0A174E] focus:border-transparent">
          <option value="">Select Category</option>
          <option>Web Development</option>
          <option>App Development</option>
          <option>Digital Marketing</option>
          <option>Brand Design</option>
          <option>UI/UX</option>
        </select>
      </div>

    </div>
      

      <!-- Thumbnail Upload -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Thumbnail</label>
        <input type="file" name="thumbnail" accept="image/*" id="thumbInput"
          class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base">
        <img id="thumbPreview" src="#" alt="" 
          class="hidden mt-3 w-32 h-32 object-cover rounded-lg border border-gray-200 mx-auto">
      </div>

      <!-- Description -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="3" 
          class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-[#0A174E] focus:border-transparent"></textarea>
      </div>

      <!-- Team -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Team</label>
        <input type="text" name="team" placeholder="e.g. Atlas Dev Squad"
          class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-[#0A174E] focus:border-transparent">
      </div>

      <!-- Status -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" 
          class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-[#0A174E] focus:border-transparent">
          <option>Active</option>
          <option>Pending</option>
          <option>Completed</option>
        </select>
      </div>

      <!-- Submit -->
      <div class="pt-2">
        <button type="submit"
          class="w-full bg-[#0A174E] text-white py-2 sm:py-3 rounded-lg hover:bg-[#122A80] transition">
          Save Project
        </button>
      </div>

    </form>
  </div>
</div>

<!-- JS -->
<script>
  const openModal = document.getElementById('openCreateModal');
  const closeModal = document.getElementById('closeCreateModal');
  const modal = document.getElementById('createModal');
  const thumbInput = document.getElementById('thumbInput');
  const thumbPreview = document.getElementById('thumbPreview');

  openModal.addEventListener('click', () => modal.classList.remove('hidden'));
  closeModal.addEventListener('click', () => modal.classList.add('hidden'));
  window.addEventListener('click', e => { if (e.target === modal) modal.classList.add('hidden'); });

  // Image Preview
  thumbInput.addEventListener('change', e => {
    const file = e.target.files[0];
    if (file) {
      thumbPreview.src = URL.createObjectURL(file);
      thumbPreview.classList.remove('hidden');
    }
  });
</script>

<style>
  @keyframes fadeIn {
    from {opacity: 0; transform: scale(0.9);}
    to {opacity: 1; transform: scale(1);}
  }
  .animate-fadeIn { animation: fadeIn 0.3s ease-in-out; }
</style>


    <!-- Footer -->
    <?php include "./includes/footer.php"; ?>
  </main>
</div>

<!-- SCRIPT SECTION -->
<?php include "./includes/script.php"; ?>

<script>
  function setView(view) {
    const gridBtn = document.getElementById('gridBtn');
    const listBtn = document.getElementById('listBtn');
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');

    if (view === 'grid') {
      gridView.classList.remove('hidden');
      listView.classList.add('hidden');
      gridBtn.classList.add('bg-[#0A174E]', 'text-white');
      listBtn.classList.remove('bg-[#0A174E]', 'text-white');
    } else {
      gridView.classList.add('hidden');
      listView.classList.remove('hidden');
      listBtn.classList.add('bg-[#0A174E]', 'text-white');
      gridBtn.classList.remove('bg-[#0A174E]', 'text-white');
    }
  }
</script>
</body>
</html>
