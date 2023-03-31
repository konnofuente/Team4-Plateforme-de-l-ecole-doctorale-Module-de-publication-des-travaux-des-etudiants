

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Reporting</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active">Reporting</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Dossier <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    <i class="fa fa-book" aria-hidden="true" style="font-size: 25px;"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo e($dossier_nombre); ?></h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Dossier <span>| Authorisation</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo e($authorisation_nombre); ?></h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Dossier <span>| Attente de Note</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-book" aria-hidden="true" ></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo e($attente_note_nombre); ?></h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Dossier <span>| Authorisation Valider</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-book" aria-hidden="true" ></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo e($authorisation_valider_nombre); ?></h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php if(isset($datas)): ?>
                    <?php if(count($datas) > 0): ?>
                        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <div class="col-md-4 col-md-4">

                                <div class="card info-card customers-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Departement
                                            <span>|<?php echo e($data['departement']); ?></span><span>|<?php echo e($data['niveau']); ?></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center "
                                                style="background-color: #f6f6fe">
                                                <i class="fa fa-book" style="color: blue;" aria-hidden="true"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php echo e($data['nombre']); ?></h6>


                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/index.blade.php ENDPATH**/ ?>