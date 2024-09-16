<form action="<?php echo e(route('profile.updatePhoto')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="profile_photo">Yeni Profil Fotoğrafı Yükle</label>
        <input type="file" name="profile_photo" id="profile_photo" accept="image/*" required>
    </div>
    <button type="submit" class="btn">Fotoğrafı Güncelle</button>
</form>
<?php /**PATH C:\Users\RUMEYSA\stajweb\resources\views/profile/partials/update-profile-photo-form.blade.php ENDPATH**/ ?>