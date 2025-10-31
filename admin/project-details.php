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
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Project Details</h1>
                <p class="text-gray-600">Manage and edit project information easily.</p>
            </div>
            <a href="projects.php" 
               class="mt-4 sm:mt-0 inline-flex items-center bg-[#0A174E] text-white px-4 py-2 rounded-lg hover:bg-[#122A80] transition">
                ← Back to Projects
            </a>
        </div>

        <!-- Project Overview -->
        <div class="bg-white rounded-2xl shadow-md p-6 mb-8 border border-gray-100">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Thumbnail -->
                <div class="flex-shrink-0">
                    <img src="./assets/images/sample-project.jpg" 
                         alt="Project Thumbnail" 
                         class="w-full sm:w-64 h-40 object-cover rounded-xl border border-gray-200">
                </div>

                <!-- Details -->
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold text-[#0A174E] mb-3">Atlas Creative Campaign</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        A dynamic cross-platform campaign combining brand storytelling, visual media, and digital performance marketing.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <p><strong>Category:</strong> <span class="text-gray-600">Digital Marketing</span></p>
                        <p><strong>Status:</strong> 
                            <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded-md text-xs font-medium">Active</span>
                        </p>
                        <p><strong>Team:</strong> <span class="text-gray-600">Atlas Dev Squad</span></p>
                        <p><strong>Created On:</strong> <span class="text-gray-600">Oct 18, 2025</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-[#0A174E] mb-4">Edit Project Details</h3>
            <form action="./functions/update-project.php" method="POST" enctype="multipart/form-data" class="space-y-5">
                <!-- Hidden Project ID -->
                <input type="hidden" name="project_id" value="<?php echo $_GET['id'] ?? ''; ?>">

                <!-- Project Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Project Name</label>
                    <input type="text" name="project_name" value="Atlas Creative Campaign" 
                        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0A174E] focus:outline-none">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category" 
                        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0A174E]">
                        <option>Web Development</option>
                        <option selected>Digital Marketing</option>
                        <option>Brand Design</option>
                        <option>App Development</option>
                        <option>UI/UX</option>
                    </select>
                </div>

                <!-- Thumbnail Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Thumbnail</label>
                    <input type="file" name="thumbnail" accept="image/*" 
                        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2">
                    <img src="./assets/images/sample-project.jpg" 
                         class="mt-3 w-40 h-28 object-cover rounded-lg border">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="4" 
                        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0A174E] focus:outline-none">
A dynamic cross-platform campaign combining brand storytelling, visual media, and digital performance marketing.
                    </textarea>
                </div>

                <!-- Team -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Team</label>
                    <input type="text" name="team" value="Atlas Dev Squad"
                        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0A174E] focus:outline-none">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" 
                        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#0A174E]">
                        <option>Pending</option>
                        <option selected>Active</option>
                        <option>Completed</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row sm:justify-between gap-3 pt-3">
                    <button type="submit" 
                        class="w-full sm:w-auto bg-[#0A174E] text-white px-6 py-2 rounded-lg hover:bg-[#122A80] transition">
                        Save Changes
                    </button>
                    <button type="button" 
                        onclick="confirmDelete()" 
                        class="w-full sm:w-auto bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                        Delete Project
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <?php include "./includes/footer.php"; ?>
    </main>
</div>

<!-- SCRIPT SECTION -->
<?php include "./includes/script.php"; ?>

<script>
function confirmDelete() {
    if (confirm('Are you sure you want to permanently delete this project?')) {
        window.location.href = './functions/delete-project.php?id=<?php echo $_GET["id"] ?? ""; ?>';
    }
}
</script>
