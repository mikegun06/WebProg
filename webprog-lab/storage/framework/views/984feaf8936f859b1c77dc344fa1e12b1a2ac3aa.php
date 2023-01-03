<?php echo $__env->yieldContent('content'); ?>
<div class="button">
    <ul>
        <li><a href="/login">Login</a></li>
        <li><a href="/home">Home</a></li>
        <li><a href="#">Profil</a></li>
    </ul>
</div>








<?php echo $__env->make('template.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('template.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\BINUS\Kuliah\Semester 5\Lab - Web Programming\WebProg\webprog-lab\resources\views/main.blade.php ENDPATH**/ ?>