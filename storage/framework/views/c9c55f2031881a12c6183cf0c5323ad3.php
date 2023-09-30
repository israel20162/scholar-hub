 <!-- Individual Forum Post View Page -->
<div class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-500">

    <!-- Page Header -->
    <div class=" py-6">
        <h1 class="text-3xl md:text-4xl font-bold capitalize text-white text-center"><?php echo e($post->title); ?></h1>
    </div>
<div class="flex justify-center items-center p-4">
    <!-- __BLOCK__ --><?php if($post->likedByUsers->contains(auth()->id())): ?>
        <button wire:click="unlikePost" class="bg-red-500 text-white px-4 py-2 rounded">Unlike</button>
    <?php else: ?>
        <button wire:click="likePost" class="bg-indigo-500 text-white px-4 py-2 rounded">Like</button>
    <?php endif; ?> <!-- __ENDBLOCK__ -->
    <span class="text-sm dark:text-gray-500 mx-4"><?php echo e($post->likes_count); ?> <?php echo e(Str::plural('like', $post->likes_count)); ?></span>
</div>
    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-12">

        <!-- Main Post -->
        <article class="mb-12 bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <header class="mb-4 flex justify-between items-center">
                <span class="text-gray-600 dark:text-gray-400  ">By: <span class="dark:text-indigo-600"> <?php echo e($post->user->name); ?></span> </span>
                <span class="text-sm text-gray-600 dark:text-gray-400"><?php echo e($post->created_at->diffForHumans()); ?></span>
            </header>
            <div class="text-gray-700 text-lg dark:text-gray-300 space-y-4">
                <p>
                    <?php echo e($post->body); ?>

                </p>
                <!-- ... more paragraphs, images, and other content ... -->
            </div>
        </article>

        <!-- Replies/Comments Section -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-300 mb-6">Replies (<?php echo e($post->replies->count()); ?>)</h2>

            <!-- Individual Reply -->
             <!-- __BLOCK__ --><?php $__empty_1 = true; $__currentLoopData = $post->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="mb-8 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                <header class="mb-4 flex justify-between">
                    <span class="text-gray-600 dark:text-gray-400"><?php echo e($reply->user?->name); ?></span>
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
            <div>
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-4">Leave a Reply:</h3>
                <textarea wire:model="reply" class="w-full p-4 mb-4 rounded-lg dark:bg-gray-800 dark:text-gray-300" rows="4" placeholder="Share your thoughts..."></textarea>
                <button wire:click="addReply" wire:loading.attr="disabled" class="px-6 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">Submit Reply <span wire:loading wire:target="addReply">...</span></button>
            </div>
        </section>
    </div>


</div>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/livewire/view-forum-post.blade.php ENDPATH**/ ?>