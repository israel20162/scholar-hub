  <div class="bg-white dark:bg-gray-900 md:ml-10 min-h-screen transition-colors duration-500">
      <!-- Flash message for post creation -->
      <!-- __BLOCK__ --><?php if(session()->has('message')): ?>
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline"><?php echo e(session('message')); ?></span>
          </div>
      <?php endif; ?> <!-- __ENDBLOCK__ -->
      <!-- Page Header -->
      <div class=" py-6">
          <h1 class="text-3xl md:text-4xl font-bold text-white text-center">Topics</h1>
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
              <a href="<?php echo e(route('topic.create')); ?>"
                  class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Create New
                  Topic</a>
          </div>

      </div>


      <!-- Main Content Container -->
      <div class="container mx-auto px-4 ">
          <!-- Search Bar -->
          <div>
              <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-box','data' => ['placeHolder' => 'topics']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeHolder' => 'topics']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
          </div>

          <!-- Topics List -->
          <ul class="divide-y divide-gray-200 dark:divide-gray-700">
              <!-- __BLOCK__ --><?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="py-6">
                      <div class="flex justify-between">
                          <!-- Thread Title -->
                          <a href="<?php echo e(route('topic.single', ['id' => $topic->id])); ?>"
                              class="text-xl text-gray-900 dark:text-gray-100 hover:underline"><?php echo e($topic->title); ?></a>
                          <span class="text-sm dark:text-gray-500"><?php echo e($topic->created_at->diffForHumans()); ?></span>
                      </div>


                      <!-- Thread Details -->
                      <div class="mt-2 flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
                          <span class="capitalize">By: <?php echo e($topic->user->name); ?></span>
                          <p class="gap-2 flex"><span><?php echo e($topic->likes_count); ?> likes
                                  

                      </div>
                      <div>
                          <!-- __BLOCK__ --><?php $__currentLoopData = json_decode($topic->categories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <span class="text-sm dark:text-indigo-600">#<?php echo e($category); ?></span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                      </div>
                      <!-- Thread Snippet -->
                      <article class=" !mt-4 child:dark:text-gray-300 child:first-letter:capitalize first-letter:capitalize  dark:!text-gray-300   ">
                          <?php echo Str::limit($topic->body, 100); ?></article>


                  </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->




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

      <!-- Page Footer (optional) -->
      <footer class="bg-gray-100 dark:bg-gray-800 py-6">
          <!-- Footer content, such as links, copyrights, etc. -->
      </footer>
  </div>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/livewire/topic/topics.blade.php ENDPATH**/ ?>