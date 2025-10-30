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
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-2">Welcome back, John</h1>
                <p class="text-gray-600 dark:text-gray-400">Here's what's happening with your projects today.</p>
            </div>

            <!-- Summary Cards -->
            <?php include "./functions/summary.php"; ?>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Recent Activity -->
               <?php include "./functions/recent-activity.php"; ?>

                <!-- Performance Chart -->
                <?php include "./functions/performance.php"; ?>
            </div>

            <!-- Active Projects -->
           <?php include "./functions/active-projects.php"; ?>
            
            <!-- Footer -->
              <?php include "./includes/footer.php"; ?>
        </main>
    </div>



    <!-- SCRIPT SECTION -->
    <?php include "./includes/script.php" ?>
</body>
</html>