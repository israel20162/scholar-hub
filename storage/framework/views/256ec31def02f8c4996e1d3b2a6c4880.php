  <!-- Individual Topic View Page -->
<div class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-500">

    <!-- Page Header -->
    <div class=" py-6">
        <h1 class="text-3xl md:text-4xl capitalize font-bold text-white text-center"><?php echo e($topic->title); ?></h1>
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


<div class="flex justify-end pb-12  items-baseline md:justify-center md:items-center md:p-4">
    <!-- __BLOCK__ --><?php if($topic->likedByUsers->contains(auth()->id())): ?>
        <button wire:click="unlikePost" class="bg-red-500 text-white px-4 py-2 rounded">Unlike</button>
    <?php else: ?>
        <button wire:click="likePost" class="bg-indigo-500 text-white px-4 py-2 rounded">Like</button>
    <?php endif; ?> <!-- __ENDBLOCK__ -->
    <span class="text-sm dark:text-gray-500 mx-4"><?php echo e($topic->likes_count); ?> <?php echo e(Str::plural('like', $topic->likes_count)); ?></span>
</div>
        <!-- Replies/Comments Section -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-300 mb-6">Replies (<?php echo e($topic->replies->count()); ?>)</h2>

            <!-- Individual Reply -->
             <!-- __BLOCK__ --><?php $__empty_1 = true; $__currentLoopData = $topic->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="mb-8 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                <header class="mb-4 flex justify-between">
                    <span class="text-gray-600 capitalize dark:text-gray-400"><?php echo e($reply->user?->name); ?></span>
                    <span class="text-sm text-gray-600 dark:text-gray-400"><?php echo e($reply->created_at->diffForHumans()); ?></span>
                </header>
                <div class="text-gray-700 dark:text-gray-300">
                    <p><?php echo e($reply->body); ?></p>
                </div>
            </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<h1 class="text-2xl text-center w-full mx-auto">No Replies</h1>
             <?php endif; ?> <!-- __ENDBLOCK__ -->



            <!-- Reply Form -->
            <div class="w-full flex  flex-col">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-4">Leave a Reply:</h3>
                <textarea wire:model="reply" class="w-full p-4 mb-4 rounded-lg dark:bg-gray-800 dark:text-gray-300" rows="4" placeholder="Share your thoughts..."></textarea>
                <button wire:click="addReply" wire:loading.attr="disabled" class="px-6 py-2 w-fit justify-end ml-auto md:m-0 rounded-lg bg-indigo-600 text-white  hover:bg-indigo-700 transition">Submit Reply <span wire:loading wire:target="addReply">...</span></button>
            </div>
        </section>
    </div>


</div>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/livewire/topic/view-topic-post.blade.php ENDPATH**/ ?>