  <!-- Individual Topic View Page -->
<div class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-500">

    <!-- Page Header -->
    <div class=" py-6">
        <h1 class="text-3xl md:text-4xl font-bold text-white text-center">{{$topic->title}}</h1>
    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-12">

        <!-- Topic Details -->
        <article class="mb-12">
            <header class="flex justify-between items-center mb-6">
               <span class="text-gray-600 dark:text-gray-400  ">By: <span class="dark:text-indigo-600"> {{$topic->user->name}}</span> </span>
                <span class="text-sm text-gray-600 dark:text-gray-400">Category: <strong class="text-indigo-600 dark:text-indigo-400"> @foreach (json_decode($topic->categories) as $category)
                            <span class="text-sm dark:text-indigo-600">{{ $category }},</span>
                        @endforeach</strong></span>
            </header>
            <div class="text-gray-700 dark:text-gray-300 space-y-4">
                <!-- Topic Content -->
                <p>
                   {{$topic->body}}
                </p>
                <!-- ... more paragraphs, images, and other content ... -->
            </div>
        </article>

        {{-- <!-- Comments Section -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-300 mb-6">Comments (12)</h2>

            <!-- Individual Comment -->
            <div class="mb-8 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                <header class="mb-4 flex justify-between">
                    <span class="text-gray-600 dark:text-gray-400">By Jane Smith</span>
                    <span class="text-sm text-gray-600 dark:text-gray-400">2 hours ago</span>
                </header>
                <div class="text-gray-700 dark:text-gray-300">
                    <p>This topic is very insightful! Thanks for sharing.</p>
                </div>
            </div>
            <!-- Repeat the above block for additional comments -->

            <!-- Add Comment Form -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-4">Leave a Comment:</h3>
                <textarea class="w-full p-4 mb-4 rounded-lg dark:bg-gray-800 dark:text-gray-300" rows="4" placeholder="Share your thoughts..."></textarea>
                <button class="px-6 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">Submit Comment</button>
            </div>
        </section> --}}
    </div>


</div>
