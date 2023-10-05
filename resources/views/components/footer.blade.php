<footer class="bg-gray-900 mt-6 text-white py-10">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Useful Links for Students -->
        <div>
            <h2 class="text-xl font-bold mb-4">Student Resources</h2>
            <ul>
                {{-- <li class="mb-2"><a href="#" class="hover:text-gray-300">Study Tips</a></li>
                <li class="mb-2"><a href="#" class="hover:text-gray-300">Campus Map</a></li>
                <li class="mb-2"><a href="#" class="hover:text-gray-300">Online Library</a></li>
                <li><a href="#" class="hover:text-gray-300">Student Discounts</a></li> --}}
            </ul>
        </div>

        <!-- Social Links -->
        <div>
            <h2 class="text-xl font-bold mb-4">Connect With Us</h2>
            <ul>
                <li class="mb-2"><a href="#" class="hover:text-gray-300">Facebook</a></li>
                <li class="mb-2"><a href="#" class="hover:text-gray-300">Twitter</a></li>
                <li class="mb-2"><a href="#" class="hover:text-gray-300">Instagram</a></li>
                <li><a href="#" class="hover:text-gray-300">LinkedIn</a></li>
            </ul>
        </div>

        <!-- Advertising Inquiry Form -->
        <div>
            <h2 class="text-xl font-bold mb-4">Advertise/Partner With Us</h2>
            <form action="/send-inquiry" method="POST">
                @csrf
                <div class="mb-4">
                    <input type="text" placeholder="Your Name" name="name" class="w-full px-3 py-2 bg-gray-800 rounded focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <input type="email" placeholder="Email Address" name="email" class="w-full px-3 py-2 bg-gray-800 rounded focus:outline-none focus:shadow-outline" required>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-600 rounded hover:bg-blue-700 focus:bg-blue-800">Submit</button>
            </form>
        </div>
    </div>

    <!-- Footer Bottom Text -->
    <div class="mt-8 text-center">
        <p>&copy; {{ date('Y') }} Scholars Hub. All rights reserved.</p>
    </div>
</footer>
