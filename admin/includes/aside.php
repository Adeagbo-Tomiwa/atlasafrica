<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<aside id="sidebar" class="sidebar-transition fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-gray-200 shadow-xl lg:shadow-none -translate-x-full lg:translate-x-0">
    <div class="flex flex-col h-full p-6 pt-8 overflow-y-auto">
        <nav class="flex-1 space-y-2 mt-20">
            <!-- Dashboard -->
            <a href="dashboard.php" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl transition-all 
                <?php echo ($currentPage == 'dashboard.php') 
                    ? 'bg-black text-white shadow-lg' 
                    : 'text-gray-600 hover:bg-gray-100 hover:text-black'; ?>">
                <i class="fas fa-home"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <!-- Projects -->
            <a href="projects.php" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl transition-all 
                <?php echo ($currentPage == 'projects.php') 
                    ? 'bg-black text-white shadow-lg' 
                    : 'text-gray-600 hover:bg-gray-100 hover:text-black'; ?>">
                <i class="fas fa-briefcase"></i>
                <span class="font-medium">Projects</span>
            </a>

            <!-- Clients -->
            <a href="clients.php" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl transition-all 
                <?php echo ($currentPage == 'clients.php') 
                    ? 'bg-black text-white shadow-lg' 
                    : 'text-gray-600 hover:bg-gray-100 hover:text-black'; ?>">
                <i class="fas fa-users"></i>
                <span class="font-medium">Clients</span>
            </a>

            <!-- Media -->
            <a href="media.php" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl transition-all 
                <?php echo ($currentPage == 'media.php') 
                    ? 'bg-black text-white shadow-lg' 
                    : 'text-gray-600 hover:bg-gray-100 hover:text-black'; ?>">
                <i class="fas fa-film"></i>
                <span class="font-medium">Media</span>
            </a>

            <!-- Analytics -->
            <a href="analytics.php" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl transition-all 
                <?php echo ($currentPage == 'analytics.php') 
                    ? 'bg-black text-white shadow-lg' 
                    : 'text-gray-600 hover:bg-gray-100 hover:text-black'; ?>">
                <i class="fas fa-chart-bar"></i>
                <span class="font-medium">Analytics</span>
            </a>

            <!-- Subscribers -->
            <a href="subscribers.php" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl transition-all 
                <?php echo ($currentPage == 'subscribers.php') 
                    ? 'bg-black text-white shadow-lg' 
                    : 'text-gray-600 hover:bg-gray-100 hover:text-black'; ?>">
                <i class="fas fa-envelope"></i>
                <span class="font-medium">Subscribers</span>
            </a>

            <!-- Settings -->
            <a href="settings.php" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl transition-all 
                <?php echo ($currentPage == 'settings.php') 
                    ? 'bg-black text-white shadow-lg' 
                    : 'text-gray-600 hover:bg-gray-100 hover:text-black'; ?>">
                <i class="fas fa-cog"></i>
                <span class="font-medium">Settings</span>
            </a>
        </nav>

        <!-- Logout -->
        <a href="logout.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-red-50 hover:text-red-600 transition-all mt-auto">
            <i class="fas fa-sign-out-alt"></i>
            <span class="font-medium">Logout</span>
        </a>
    </div>
</aside>
