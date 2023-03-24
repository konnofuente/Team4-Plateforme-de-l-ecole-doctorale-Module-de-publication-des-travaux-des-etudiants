<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gestion des Etudiants</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="<?php echo e(asset('assets/img/Blason_univ_Yaoundé_1.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/css/all.min.css')); ?>">

    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <style>
        .specifie_collapase {
            display: none;
        }
    </style>
</head>

<body>
    <?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>GestionEtudiant</span></strong>. All Rights Reserved
        </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <?php echo $__env->yieldContent('modals'); ?>

    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/layouts/admin/body.blade.php ENDPATH**/ ?>