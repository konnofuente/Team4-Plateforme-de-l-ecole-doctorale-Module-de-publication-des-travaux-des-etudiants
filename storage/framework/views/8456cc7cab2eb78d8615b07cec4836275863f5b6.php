
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarFaculte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="text-capitalize">Gestion des Unite de Recherches</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Faculte</li>
                    <li class="breadcrumb-item active">Unite de Recherche</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 35px">Gestions des Unite de Recherche</h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">

                <?php if($unite_recherches->count() > 0): ?>
                    <div class="card-body">
                        <br>
                        <div class="row">
                            <div class="col-md-4"><a href="<?php echo e(route('Ecole_Doctorat.unite_recherche.create')); ?>"> <i class="fa fa-plus"
                                        aria-hidden="true"></i> Ajouter une nouvelle Unite de Recherche</a></div>
                            <div class="search-bars col-md-10">
                                
                            </div>
                        </div>



                        <br>

                        <!-- Dark Table -->
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">intitule</th>
                                    <th scope="col">Nombre Dossier</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                <?php $__currentLoopData = $unite_recherches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unite_recherche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($unite_recherche->id); ?>">
                                        <th scope="row"><?php echo e($n); ?></th>
                                        <td><?php echo e($unite_recherche->code); ?></td>
                                        <td><?php echo e($unite_recherche->intitule); ?></td>
                                        <td><?php echo e($unite_recherche->dossiers->count()); ?></td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="editUniteRecherche(<?php echo e($unite_recherche->id); ?>)"
                                                class="btn btn-danger"><i class="fa fa-edit"
                                                    aria-hidden="true"></i> Modifier</a>
                                            <a onclick="return confirm('Voulez vous supprimer cet unite de recherche avec tout sont contenu?')"
                                                href="<?php echo e(route('Ecole_Doctorat.unite_recherche.delete', $unite_recherche->id)); ?>"
                                                class="btn btn-secondary"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></i> Supprimer</a>
                                        </td>

                                    </tr>
                                    <div style="display:none;"><?php echo e($n += 1); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="paNiveaugination justify-content-center">
                            <?php echo e($unite_recherches->links()); ?>

                        </div>
                        <!-- End Dark Table -->

                    </div>
                <?php else: ?>
                    <div class="col-12"><a href="<?php echo e(route('Ecole_Doctorat.unite_recherche.create')); ?>"> <i class="fa fa-plus"
                                aria-hidden="true"></i> Ajouter une nouvelle unite de Recherche</a></div>
                    <div>Vous n'avez pas encore ajouter d'unite de recherche</div>
                <?php endif; ?>

            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('layouts.modals.uniteRecherche', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/ecoleDoctorat/uniteRecherche.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/unite_recherche/index.blade.php ENDPATH**/ ?>