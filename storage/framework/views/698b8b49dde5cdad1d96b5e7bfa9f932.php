

<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>





<!-- Hero Section -->
<div class="bg-gray-800 text-white relative overflow-hidden">

    <!-- Optional Background Image -->
    <img src="https://epe.brightspotcdn.com/dims4/default/d38a8b1/2147483647/strip/true/crop/5832x3957+202+490/resize/840x570!/format/webp/quality/90/?url=https%3A%2F%2Fepe-brightspot.s3.amazonaws.com%2Ff5%2Fb0%2F8ed10b914b1c9fd422465cc2866d%2Fhigh-school-students-collaboration-technology-1023211724.jpg" alt="Students Collaborating" class="absolute inset-0 h-full w-full object-cover opacity-50">

    <div class="relative container mx-auto p-8">

        <!-- Main Heading -->
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Empower Your Learning Journey</h1>

        <!-- Subheading or Description -->
        <p class="text-lg md:text-xl mb-6">Collaborate, explain, quiz, and share insights with fellow students.</p>

        <!-- Call to Action Buttons -->
        <div class="flex space-x-4">
            <a href="/explore" class="bg-white text-indigo-600 hover:bg-indigo-800 hover:text-white py-2 px-6 rounded-full font-semibold transition">Explore Topics</a>
            <a href="/join" class="bg-transparent border-2 border-white py-2 px-6 rounded-full hover:bg-indigo-800 hover:border-indigo-800 hover:text-white font-semibold transition">Join Now</a>
        </div>

    </div>
</div>

<!-- Trending Topics/Content Section -->
<section class="bg-white dark:bg-slate-950 py-16 transition-colors duration-500">
    <div class="container mx-auto px-4">

        <!-- Section Title -->
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-gray-300 mb-12 text-center">Trending Topics</h2>

        <!-- Topics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Single Topic (Repeat for each topic) -->
            <div class="topic bg-gray-100 dark:bg-black p-6 rounded-lg transition-shadow duration-500 hover:shadow-lg">
                <!-- Topic Title -->
                <a href="/topic-link" class="text-xl text-gray-900 dark:text-white hover:underline mb-4 block">Topic Title</a>

                <!-- Topic Details -->
                <p class="text-sm text-gray-600 dark:text-white mb-4">Brief description or snippet of the topic to give users an idea...</p>

                <!-- Topic Metadata -->
                <div class="flex justify-between items-center text-xs text-gray-600 dark:text-white">
                    <span>By Jane Doe</span>
                    <span>45 comments</span>
                </div>
            </div>

            <!-- Repeat the above block for additional trending topics -->

        </div>

        <!-- View All Topics Button -->
        <div class="text-center mt-12">
            <a href="/all-topics" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition">View All Topics</a>
        </div>

    </div>
</section>

<!-- Latest Contributions Section -->
<section class="bg-gray-100 dark:bg-slate-950 dark:text-white py-12">
    <div class="container mx-auto px-4">

        <!-- Section Heading -->
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center">Latest Contributions</h2>

        <!-- Contributions Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Single Contribution (Repeat this block for each contribution) -->
            <div class="bg-white dark:bg-black dark:text-white p-6 rounded-lg shadow-md">
                <!-- Contribution Title -->
                <h3 class="text-xl font-semibold mb-3">Topic or Contribution Title</h3>

                <!-- Contributor Info -->
                <div class="flex items-center mb-4">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80" alt="" class="w-10 h-10 rounded-full mr-3">
                    <span class="text-gray-600 dark:text-indigo-600 dark:hover:text-indigo-700">By John Doe</span>
                </div>

                <!-- Contribution Snippet or Description -->
                <p class="text-gray-700 dark:text-white mb-4">
                    A brief snippet or description of the contribution, ideally not more than two lines or so...
                </p>

                <!-- Read More Link -->
                <a href="/link-to-full-contribution" class="text-indigo-600 hover:text-indigo-800 transition">Read more &rarr;</a>
            </div>
            <div class="bg-white dark:bg-black dark:text-white p-6 rounded-lg shadow-md">
                <!-- Contribution Title -->
                <h3 class="text-xl font-semibold mb-3">Topic or Contribution Title</h3>

                <!-- Contributor Info -->
                <div class="flex items-center mb-4">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=80" alt="" class="w-10 h-10 rounded-full mr-3">
                    <span class="text-gray-600 dark:text-indigo-600 dark:hover:text-indigo-700">By John Doe</span>
                </div>

                <!-- Contribution Snippet or Description -->
                <p class="text-gray-700 dark:text-white mb-4">
                    A brief snippet or description of the contribution, ideally not more than two lines or so...
                </p>

                <!-- Read More Link -->
                <a href="/link-to-full-contribution" class="text-indigo-600 hover:text-indigo-800 transition">Read more &rarr;</a>
            </div>

            <!-- Repeat above block for other contributions -->

        </div>

        <!-- See All Contributions Button -->
        <div class="text-center mt-8">
            <a href="/all-contributions" class="dark:bg-indigo-600 dark:text-white  px-6 py-3 rounded-full hover:bg-indigo-700 transition">See All Contributions</a>
        </div>
    </div>
</section>

<!-- Contribute CTA Section -->
<section class="bg-indigo-700 text-white dark:bg-slate-950  dark:text-gray-200 py-16 ">
    <div class="container mx-auto px-4 text-center">

        <!-- Main Message -->
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Share Your Knowledge!</h2>

        <!-- Sub Message -->
        <p class="text-xl md:text-2xl mb-8">Contribute explanations, quizzes, or ideas and collaborate with thousands of fellow students.</p>

        <!-- CTA Button -->
        <a href="/contribute" class="bg-white text-indigo-700 dark:bg-indigo-600 dark:text-white px-8 py-4 rounded-full hover:bg-gray-200 transition">Start Contributing Now</a>

    </div>
</section>
<!-- Discussion Forums/Threads Section -->
<section class="bg-white dark:bg-slate-950 py-16 transition-colors duration-500">
    <div class="container mx-auto px-4">

        <!-- Section Title -->
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-gray-300 mb-12 text-center">Discussion Forums</h2>

        <!-- Discussion List -->
        <ul class="divide-y divide-gray-200 dark:divide-gray-800">

            <!-- Single Discussion (Repeat for each discussion) -->
            <li class="py-6">
                <!-- Discussion Title -->
                <a href="/discussion-link" class="text-xl text-gray-900 dark:text-gray-100 hover:underline">Discussion or Thread Title</a>

                <!-- Discussion Details -->
                <div class="mt-2 flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
                    <span>Posted by John Doe</span>
                    <span>15 comments</span>
                </div>
            </li>

            <!-- Repeat the above <li> block for additional discussions -->

        </ul>

        <!-- View All Discussions Button -->
        <div class="text-center mt-12">
            <a href="/all-discussions" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition">View All Discussions</a>
        </div>

    </div>
</section>

<!-- Community Stats Section -->
<section class="bg-white dark:bg-slate-950 text-gray-800 dark:text-gray-300 py-16 transition-colors duration-500">
    <div class="container mx-auto px-4 text-center">

        <!-- Section Title -->
        <h2 class="text-3xl md:text-4xl font-bold mb-12">Community Stats</h2>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Single Stat Block -->
            <div class="stat">
                <!-- Number -->
                <span class="text-4xl font-bold">12,500</span>
                <!-- Description -->
                <p class="mt-2 text-gray-600 dark:text-gray-400">Total Members</p>
            </div>

            <!-- Another Stat Block -->
            <div class="stat">
                <span class="text-4xl font-bold">350</span>
                <p class="mt-2 text-gray-600 dark:text-gray-400">New This Week</p>
            </div>

            <!-- Another Stat Block -->
            <div class="stat">
                <span class="text-4xl font-bold">2,180</span>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Active Topics</p>
            </div>

            <!-- Another Stat Block -->
            <div class="stat">
                <span class="text-4xl font-bold">7,450</span>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Completed Quizzes</p>
            </div>
        </div>
    </div>
</section>






 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>


<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/home.blade.php ENDPATH**/ ?>