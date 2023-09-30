 <header class="bg-slate-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">

            <!-- Logo or Brand Name -->
             <div class="text-3xl font-bold">
                <div class="">Scholars Hub</div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-4">
                <a href="/" class="hover:text-blue-300">Home</a>
                <a href="/about" class="hover:text-blue-300">About</a>
                <a href="/services" class="hover:text-blue-300">Services</a>
                <a href="/contact" class="hover:text-blue-300">Contact</a>

                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 hover:text-blue-300">
                        <span>Username</span>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48  text-black rounded-lg shadow-lg p-2 hidden group-hover:block">
                        <a href="/profile" class="block px-2 py-1  rounded">Profile</a>
                        <a href="/settings" class="block px-2 py-1  rounded">Settings</a>
                        <a href="/logout" class="block px-2 py-1  rounded">Logout</a>
                    </div>
                </div>
            </nav>
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth

                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

            <!-- Mobile Menu Button -->
            <button class="md:hidden">
                <!-- Add a hamburger icon or similar for mobile navigation -->
                🍔
            </button>
        </div>
    </header>
