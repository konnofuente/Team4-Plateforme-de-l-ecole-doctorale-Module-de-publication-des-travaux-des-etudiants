
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Liste des Jurys</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active">Jurys</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Liste des Jurys</h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php if($juries->count() > 0): ?>
                        <br>
                        <div class="row">
                            <div class="col-md-4"><a href="<?php echo e(route('Ecole_Doctorat.jury.create')); ?>"> <i class="fa fa-plus"
                                        aria-hidden="true"></i> Ajouter un nouveau jury</a></div>
                            
                        </div>



                        <br>

                        <!-- Dark Table -->
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                <?php $__currentLoopData = $juries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($jury->id); ?>">
                                        <th scope="row"><?php echo e($n); ?></th>
                                        <td class=" text-break" style="width:15rem"><?php echo e($jury->noms); ?></td>
                                        <td><?php echo e($jury->email); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('Ecole_Doctorat.jury.voir', $jury->id)); ?>" class="btn btn-success"><i class="fa-solid fa-person-circle-plus"></i>Voir plus</a>&ensp;
                                            <a href="javascript:void(0)" onclick="editJury(<?php echo e($jury->id); ?>)"
                                                class="btn btn-danger"><i class="fa fa-edit" aria-hidden="true"></i> Update</a>&ensp;
                                            <a onclick="return confirm('Voulez vous supprimer se jury et avec tout sont contenu?')"
                                                href="<?php echo e(route('Ecole_Doctorat.jury.delete', $jury->id)); ?>"
                                                class="btn btn-secondary"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></i>Delete</a>
                                        </td>

                                    </tr>
                                    <div style="display:none;"><?php echo e($n += 1); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            <?php echo e($juries->links()); ?>

                        </div>
                        <!-- End Dark Table -->
                    <?php else: ?>
                        <div class="col-12"><a href="<?php echo e(route('Ecole_Doctorat.jury.create')); ?>"> <i class="fa fa-plus"
                                    aria-hidden="true"></i> Ajouter un nouveau jury</a></div>
                        <div>Vous n'avez pas encore ajouter de jury</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('layouts.modals.jury', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/ecoleDoctorat/jury.js')); ?>">
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/juries/index.blade.php ENDPATH**/ ?>