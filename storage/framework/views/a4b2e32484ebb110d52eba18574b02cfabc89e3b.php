

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.admin.sidebarAdminIndex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Statistique</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Statistique</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Etudiant <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo e($etudiant_nombre); ?></h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php $__currentLoopData = $datas_filiere; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiere=>$nombre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-md-4">

                        <div class="card info-card customers-card">



                            <div class="card-body">
                                <h5 class="card-title">Filiere <span>|<?php echo e($filiere); ?></span><span>|Etudiant</span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center "
                                        style="background-color: #d6e8f3">
                                        <i class="bi bi-people" style="color: blue;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($nombre); ?></h6>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $niveau=>$nombre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-md-4">

                        <div class="card info-card customers-card">



                            <div class="card-body">
                                <h5 class="card-title">Niveaux <span>|<?php echo e($niveau); ?></span><span>|Etudiant</span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center "
                                        style="background-color: #d6e8f3">
                                        <i class="bi bi-people" style="color: blue;"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo e($nombre); ?></h6>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/admin/index.blade.php ENDPATH**/ ?>