<main>
    <div class="container mx-auto mt-8 p-4">
        <div class="flex justify-center">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-8 w-full md:w-3/4 lg:w-1/2">

                <!-- Profile Image -->
                <div class="flex justify-center">
                    @if ($user->profile_photo_url)
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                            class="rounded-full h-36 w-36 object-cover border-2 border-gray-900">
                    @else
                        <div class="rounded-full h-32 w-32 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500 text-xl">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                    @endif
                </div>

                <!-- Name and Bio -->
                <div class="text-center mt-4">
                    <h2 class="text-2xl font-semibold mb-1 dark:text-gray-300 capitalize">{{ $user->name }}</h2>
                    <p class="text-lg text-gray-600">{{ '@' . $user->name }}</p>
                     <div class="flex justify-around">
                        <div class="flex items-center">
                            <span class="text-gray-600 dark:text-gray-400">Joined: </span>
                            <span
                                class="font-medium capitalize dark:text-gray-300"> {{ $user->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex  items-center">
                            <span class="text-gray-600 dark:text-gray-400">Scholar Points: </span>
                            <span class="font-medium capitalize dark:text-gray-300">  {{ $user->karma }}</span>
                        </div>
                    </div>

                    <p class="text-gray-600 p-4 dark:text-gray-400">{{ $user->bio ?? 'No bio provided.' }}</p>
                </div>

                <!-- User Details -->
                <div class="mt-6 space-y-2 w-3/4 mx-auto">


                    <!-- Optional: Display email (make sure the user has allowed this) -->
                    <!--
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium">{{ $user->email }}</span>
                </div>
                -->



                    <!-- Add other user fields as needed -->
                </div>

                <!-- Social Links or Actions (Optional) -->
                <!-- Example: Follow Button, Message Button, etc. -->
                <div class="mt-8 text-center">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full">
                        Follow
                    </button>
                </div>

            </div>
        </div>
    </div>
</main>
