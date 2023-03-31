
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Archives</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active">Archives</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Dossiers Archivers</h1>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <br><br>
                    
                    <?php if($archives->count() > 0): ?>
                        <br>



                        <br>
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Noms & Prenom</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Niveau</th>
                                    <th scope="col">Theme</th>
                                    <th scope="col">Année</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($archive->id); ?>">
                                        <th scope="row"><?php echo e($n); ?></th>
                                        <td class=" text-break" style="width:15rem"><?php echo e($archive->etudiant['noms']); ?>

                                        </td>
                                        <td><?php echo e($archive->etudiant['matricule']); ?></td>
                                        <td class=" text-break" style="width:15rem"><?php echo e($archive->niveau->code); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-eye"
                                                        aria-hidden="true"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><?php echo e($archive->theme_recherche); ?>

                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><?php echo e($archive->annee['libelle']); ?></td>
                                        <td><?php echo e($archive->observation); ?></td>
                                        <td>
                                            -
                                            
                                            
                                        </td>

                                    </tr>
                                    <div style="display:none;"><?php echo e($n += 1); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            <?php echo e($archives->links()); ?>

                        </div>
                        <!-- End Dark Table -->
                    <?php else: ?>
                        <div>Pas de dossier archive pour le moment</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/archive/index.blade.php ENDPATH**/ ?>