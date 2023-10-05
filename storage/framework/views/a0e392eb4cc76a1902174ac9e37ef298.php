<div class="bg-white md:border-r border-s-0 dark:border-gray-700  ml-10 dark:bg-gray-900  transition-colors duration-500">

    <!-- Page Header -->
    <div class=" py-6">
        <h1 class="text-3xl md:text-4xl font-bold text-white text-center">Forums & Discussions</h1>
    </div>

    <div class="flex justify-between items-center p-4">
        <!-- Tab Menu -->
        <div class="mb-6">
            <button wire:click="switchTab('newest')"
                class="<?php echo e($tab === 'newest' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500'); ?> mr-4">Newest</button>
            <button wire:click="switchTab('popular')"
                class="<?php echo e($tab === 'popular' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500'); ?>">Popular</button>
        </div>

        <!-- Create New Post Button -->
        <div class="mb-6">
            <a href="<?php echo e(route('forum.create')); ?>"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Create New
                Post</a>
        </div>

    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-">

        <!-- Search Bar -->
        <div>
           <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-box','data' => ['placeHolder' => 'discussions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeHolder' => 'discussions']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>

        <!-- Discussion Threads List -->
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            <!-- __BLOCK__ --><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="py-6">
                    <div class="flex capitalize justify-between">
                        <!-- Thread Title -->
                        <a href="<?php echo e(route('forum.single', ['id' => $post->id])); ?>"
                            class="text-xl text-gray-900 dark:text-gray-100 hover:underline"><?php echo e($post->title); ?></a>
                        <span class="text-sm dark:text-gray-500"><?php echo e($post->created_at->diffForHumans()); ?></span>
                    </div>


                    <!-- Thread Details -->
                    <div class="mt-2 flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
                        <span class="capitalize">By: <?php echo e($post->user->name); ?></span>
                        <p class="gap-2 flex"><span><?php echo e($post->likes_count); ?> likes
                            </span><span><?php echo e($post->replies->count()); ?> comments</span></p>

                    </div>
                    <div>
                        <!-- __BLOCK__ --><?php $__currentLoopData = json_decode($post->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="text-sm dark:text-indigo-600">#<?php echo e($tag); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                    </div>

                    <!-- Thread Snippet -->
                    <p class="mt-4 text-gray-700 dark:text-gray-300">
                       <?php echo e(Str::limit( $post->body,100)); ?>

                    </p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->

            <!-- Single Discussion Thread (Repeat for each thread) -->


            <!-- Repeat the above <li> for additional threads -->

        </ul>

        <!-- Pagination (If necessary) -->
        <div class="mt-12 flex justify-center">
            <a href="#" class="mx-2 px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">1</a>
            <a href="#"
                class="mx-2 px-4 py-2 rounded-lg bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">2</a>
            <!-- ... Additional Page Numbers ... -->
            <a href="#"
                class="mx-2 px-4 py-2 rounded-lg bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Next</a>
        </div>
    </div>


</div>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/livewire/forums.blade.php ENDPATH**/ ?>