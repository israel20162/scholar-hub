 <?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['placeHolder']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['placeHolder']); ?>
<?php foreach (array_filter((['placeHolder']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

 <form class="md:w-1/3 flex justify-evenly gap-1 mb-3 ml-auto md:mr-1 ">
     <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search <?php echo e($placeHolder); ?>..."
         class="w-full p-2 rounded-lg shadow-sm text-gray-900 dark:bg-gray-800 dark:text-gray-100 transition-colors duration-500">
     <img wire:loading.delay.long wire:target="search" class="h-8 w-8 my-auto" src="<?php echo e(asset('svg/spinner-2.svg')); ?>" />
 </form>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/components/search-box.blade.php ENDPATH**/ ?>