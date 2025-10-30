<!-- Top Navigation Bar -->
    <nav class="bg-black text-white sticky top-0 z-50 shadow-2xl">
        <div class="flex items-center justify-between px-6 py-4">
            <!-- Logo & Mobile Menu -->
            <div class="flex items-center space-x-4">
                <button onclick="toggleSidebar()" class="lg:hidden text-white hover:text-yellow-300 transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 gradient-gold p-2 rounded-lg flex items-center justify-center font-bold text-[#0A174E] shadow-lg">
                        <img src="../assets/icons/Logo-Off-white-06.svg" alt="icon">
                    </div>
                    <span class="text-white font-bold text-xl hidden sm:block">Atlas Africa</span>
                </div>
            </div>
            
            <!-- Search Bar -->
            <div class="flex-1 max-w-xl mx-8 hidden md:block">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 z-50 transform -translate-y-1/2 text-gray-300"></i>
                    <input
                        type="text"
                        placeholder="Search projects, clients, media..."
                        class="w-full pl-10 pr-4 py-2 glass rounded-xl text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    />
                </div>
            </div>

            <!-- Right Side Icons -->
            <div class="flex items-center space-x-4">
                <button class="relative p-2 hover:bg-white hover:bg-opacity-10 rounded-lg transition-colors">
                    <i class="fas fa-bell text-white text-lg"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span>
                </button>
                <div class="w-10 h-10 gradient-gold rounded-full flex items-center justify-center font-bold text-[#0A174E] cursor-pointer shadow-lg hover:shadow-xl transition">
                    JD
                </div>
            </div>
        </div>
    </nav>