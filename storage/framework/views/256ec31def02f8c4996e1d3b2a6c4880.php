  <!-- Individual Topic View Page -->
<div class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-500">

    <!-- Page Header -->
    <div class=" py-6">
        <h1 class="text-3xl md:text-4xl font-bold text-white text-center"><?php echo e($topic->title); ?></h1>
    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-12">

        <!-- Topic Details -->
        <article class="mb-12">
            <header class="flex justify-between items-center mb-6">
               <span class="text-gray-600 dark:text-gray-400  ">By: <span class="dark:text-indigo-600"> <?php echo e($topic->user->name); ?></span> </span>
                <span class="text-sm text-gray-600 dark:text-gray-400">Category: <strong class="text-indigo-600 dark:text-indigo-400"> <!-- __BLOCK__ --><?php $__currentLoopData = json_decode($topic->categories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="text-sm dark:text-indigo-600"><?php echo e($category); ?>,</span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ --></strong></span>
            </header>
            <div class="text-gray-700 dark:text-gray-300 space-y-4">
                <!-- Topic Content -->
                <p>
                   <?php echo e($topic->body); ?>

                </p>
                <!-- ... more paragraphs, images, and other content ... -->
            </div>
        </article>

        
    </div>


</div>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/livewire/topic/view-topic-post.blade.php ENDPATH**/ ?>