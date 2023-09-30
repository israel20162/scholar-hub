<div>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <div><!-- __BLOCK__ --><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($item); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ --></div>

    <?php $__env->startPush('scripts'); ?>
     

    <?php $__env->stopPush(); ?>

    <script type="text/javascript">
        // Bind a function to a Event (the full Laravel class)
    </script>
</div>
<?php /**PATH C:\Users\israel\Desktop\scholar-hub\resources\views/livewire/chat/chat-messages.blade.php ENDPATH**/ ?>