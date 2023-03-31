
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profil Jury</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('Ecole_Doctorat.jury.index')); ?>">Jurys</a></li>
                    <li class="breadcrumb-item active">Profil Jury</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Profil d'un Jury</h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <br>



                    <br>

                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Profil</button>
                        </li>

                        

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">


                            <h5 class="card-title">Detaile du Profil</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Noms</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($jury->noms); ?></div>
                            </div>



                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Grade</div>
                                <div class="col-lg-9 col-md-8"> <?php echo e($jury->grade); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Telephone</div>
                                <div class="col-lg-9 col-md-8">(+237) <?php echo e($jury->telephone); ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($jury->email); ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Universite</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($jury->universite); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Faculte</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($jury->faculte); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Departement</div>
                                <div class="col-lg-9 col-md-8"><?php echo e($jury->departement); ?></div>
                            </div>
                            

                        </div>


                    </div>
                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/juries/voir.blade.php ENDPATH**/ ?>