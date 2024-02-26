
<?php $__env->startSection('content'); ?>
    <div class="b-container">
        <div class="b-panel">
            <h3>Hello!</h3>
            <p>This is email test.</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Email::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp official\htdocs\softec24\modules/Email/Views/emails/test.blade.php ENDPATH**/ ?>