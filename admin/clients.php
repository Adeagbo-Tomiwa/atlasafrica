<?php 
include "./auth_check.php"; // Protects page access
include "./functions/db_connect.php";
?>
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
        <div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Clients Management</h1>
                <p class="text-gray-600">View and manage all registered clients at Atlas Africa.</p>
            </div>

            <button id="createClientBtn" class="mt-4 lg:mt-0 bg-black text-white px-5 py-3 rounded-xl hover:bg-gray-800 transition-all">
                <i class="fas fa-user-plus mr-2"></i> Add New Client
            </button>
        </div>

        <!-- Search and Filter -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6 gap-4">
            <div class="flex items-center border border-gray-200 rounded-xl px-3 py-2 w-full lg:w-1/3 bg-white shadow-sm">
                <i class="fas fa-search text-gray-400 mr-2"></i>
                <input type="text" id="searchClients" placeholder="Search clients..." class="w-full bg-transparent outline-none text-gray-700">
            </div>

            <div class="flex items-center gap-4">
                <select id="filterStatus" class="border border-gray-200 rounded-xl px-3 py-2 text-gray-700 bg-white shadow-sm">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="pending">Pending</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>

        <!-- Clients Table -->
        <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow-sm">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Client Name</th>
                        <th class="px-6 py-4 font-semibold">Email</th>
                        <th class="px-6 py-4 font-semibold">Company</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="clientsTableBody" class="divide-y divide-gray-100">
                    <!-- Sample Row -->
                    <tr class="hover:bg-gray-50 transition-all">
                        <td class="px-6 py-4 font-medium">Sarah Johnson</td>
                        <td class="px-6 py-4">sarah.johnson@email.com</td>
                        <td class="px-6 py-4">GreenTech Energy</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Active</span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-blue-600 hover:text-blue-800"><i class="fas fa-eye"></i></button>
                            <button class="text-yellow-600 hover:text-yellow-800"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-all">
                        <td class="px-6 py-4 font-medium">David Okoro</td>
                        <td class="px-6 py-4">david.okoro@atlas.com</td>
                        <td class="px-6 py-4">Atlas Africa</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Pending</span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-blue-600 hover:text-blue-800"><i class="fas fa-eye"></i></button>
                            <button class="text-yellow-600 hover:text-yellow-800"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <p class="text-sm text-gray-600">Showing 1–10 of 42 clients</p>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">Prev</button>
                <button class="px-3 py-1 rounded-lg bg-black text-white">1</button>
                <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">2</button>
                <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">Next</button>
            </div>
        </div>

        <!-- Footer -->
        <?php include "./includes/footer.php"; ?>
    </main>
</div>


<!-- Create New Client Modal -->
<div id="createClientModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl shadow-2xl w-[95%] sm:w-[90%] md:w-[600px] max-h-[90vh] overflow-y-auto p-6 relative animate-fadeIn">
    
    <!-- Close Button -->
    <button id="closeCreateClientModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
    
    <!-- Modal Header -->
    <h2 class="text-2xl font-semibold text-[#0A174E] mb-5">Add New Client</h2>
    
    <!-- Form -->
    <form action="./functions/create-client.php" method="POST" enctype="multipart/form-data" class="space-y-4">

      <!-- Client Name -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="client_name" required
          class="w-full mt-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0A174E]">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="client_email" required
          class="w-full mt-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0A174E]">
      </div>

      <!-- Company -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Company</label>
        <input type="text" name="company" placeholder="e.g. Atlas Africa Ltd."
          class="w-full mt-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0A174E]">
      </div>

      <!-- Phone -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="tel" name="phone" placeholder="+234 800 000 0000"
          class="w-full mt-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0A174E]">
      </div>

      <!-- Profile Photo Upload -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
        <input type="file" name="photo" accept="image/*" id="clientPhotoInput"
          class="w-full mt-1 border rounded-lg px-3 py-2">
        <img id="clientPhotoPreview" src="#" alt="" class="hidden mt-3 w-28 h-28 object-cover rounded-full border">
      </div>

      <!-- Status -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status"
          class="w-full mt-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0A174E]">
          <option>Active</option>
          <option>Pending</option>
          <option>Inactive</option>
        </select>
      </div>

      <!-- Submit -->
      <div class="pt-2">
        <button type="submit"
          class="w-full bg-[#0A174E] text-white py-2.5 rounded-lg hover:bg-[#122A80] transition-all">
          Save Client
        </button>
      </div>
    </form>
  </div>
</div>

<!-- SCRIPT SECTION -->
<?php include "./includes/script.php"; ?>
<script>
  // Open modal
  document.getElementById("createClientBtn").addEventListener("click", () => {
    document.getElementById("createClientModal").classList.remove("hidden");
  });

  // Close modal
  document.getElementById("closeCreateClientModal").addEventListener("click", () => {
    document.getElementById("createClientModal").classList.add("hidden");
  });

  // Click outside modal to close
  window.addEventListener("click", (e) => {
    const modal = document.getElementById("createClientModal");
    if (e.target === modal) modal.classList.add("hidden");
  });

  // Image preview
  const clientPhotoInput = document.getElementById("clientPhotoInput");
  const clientPhotoPreview = document.getElementById("clientPhotoPreview");

  clientPhotoInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        clientPhotoPreview.src = e.target.result;
        clientPhotoPreview.classList.remove("hidden");
      };
      reader.readAsDataURL(file);
    }
  });
</script>
