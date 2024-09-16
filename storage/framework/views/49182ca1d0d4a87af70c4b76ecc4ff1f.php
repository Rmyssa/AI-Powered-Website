<!DOCTYPE html>
<html>
<head>
    <title>Film Önerileri</title>
</head>
<body>
<h1>Film Öneri Sistemi</h1>

<!-- Film adı girişi için form -->
<form method="POST" action="/get-recommendations">
    <?php echo csrf_field(); ?>
    <label for="movie_name">Film Adı:</label>
    <input type="text" id="movie_name" name="movie_name" required>
    <button type="submit">Önerileri Al</button>
</form>

<?php if(isset($recommendedMovies)): ?>
    <h2>Önerilen Filmler</h2>
    <ul>
        <?php $__currentLoopData = $recommendedMovies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($movie); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <p>Henüz bir film önerisi almadınız.</p>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\RUMEYSA\stajweb\resources\views\recommendations.blade.php ENDPATH**/ ?>