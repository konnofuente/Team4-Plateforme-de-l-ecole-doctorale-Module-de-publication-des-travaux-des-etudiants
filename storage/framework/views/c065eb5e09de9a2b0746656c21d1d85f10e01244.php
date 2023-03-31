
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarFaculte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="text-capitalize">Gestion des departements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Faculte</li>
                    <li class="breadcrumb-item active">Departement</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Gestions des departements
                    </h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">

                <?php if($departements->count() > 0): ?>
                    <div class="card-body">
                        <br>
                        <div class="row">
                            <div class="col-md-4"><a href="<?php echo e(route('Admin.departement.create')); ?>"> <i class="fa fa-plus"
                                        aria-hidden="true"></i> Ajouter un nouveau departement</a></div>
                            <div class="search-bars col-md-10">
                                <form class="search-forms d-flex align-items-center" method="GET" action="#"
                                    class="row">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="search" id="search"
                                        placeholder="Recherche d'un departement"
                                        onkeyup="fetchDepartement(document.getElementById('search').value)"
                                        title="Enter search keyword">
                                    <button type="submit" title="Searchs"><i class="bi bi-search"></i></button>
                                </form>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                <?php $__currentLoopData = $departements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($departement->id); ?>">
                                        <th scope="row"><?php echo e($n); ?></th>
                                        <td><?php echo e($departement->code); ?></td>
                                        <td><?php echo e($departement->intitule); ?></td>
                                        <?php if(Auth::user()->profil_id == 0): ?>

                                        <td><a href="<?php echo e(route('Admin.indexDept', $departement->id)); ?>"
                                                class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                Voir plus</a>
                                            <a href="javascript:void(0)" onclick="editDepartement(<?php echo e($departement->id); ?>)"
                                                class="btn btn-danger"><i class="fa fa-edit"
                                                    aria-hidden="true"></i>Update</a>
                                            <a onclick="return confirm('Voulez vous supprimer se departement et avec tout sont contenu?')"
                                                href="<?php echo e(route('Admin.departement.delete', $departement->id)); ?>"
                                                class="btn btn-secondary"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></i>Delete</a>
                                        </td>
                                        <?php else: ?>
                                            <td>-</td>
                                        <?php endif; ?>

                                    </tr>
                                    <div style="display:none;"><?php echo e($n += 1); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            <?php echo e($departements->links()); ?>

                        </div>
                        <!-- End Dark Table -->

                    </div>
                <?php else: ?>
                    <div class="col-12"><a href="<?php echo e(route('Admin.departement.create')); ?>"> <i class="fa fa-plus"
                                aria-hidden="true"></i> Ajouter un nouveau departement</a></div>
                    <div>Vous n'avez pas encore ajouter de departement</div>
                <?php endif; ?>

            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('layouts.modals.gestionDepartement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/admin/gestionDepartement.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/admin/gestionDepartement/index.blade.php ENDPATH**/ ?>