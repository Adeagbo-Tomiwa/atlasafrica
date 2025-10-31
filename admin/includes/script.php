 <script>
        // Toggle Sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Toggle Dark Mode
        function toggleDarkMode() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('themeIcon');
            
            html.classList.toggle('dark');
            
            if (html.classList.contains('dark')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        }

        // Animate progress bars on load
        window.addEventListener('load', () => {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            const sidebar = document.getElementById('sidebar');
            const menuButton = e.target.closest('[onclick="toggleSidebar()"]');
            
            if (!sidebar.contains(e.target) && !menuButton && window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>