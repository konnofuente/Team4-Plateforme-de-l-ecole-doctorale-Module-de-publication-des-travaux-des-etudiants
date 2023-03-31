
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarFaculte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="text-capitalize">Gestion des Etudiants</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Faculte</li>
                    <li class="breadcrumb-item active">Etudiants</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Gestions des Etudiants</h1>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <br>
                    <?php if($etudiants != null): ?>
                        <div class="col-12 text-center p-3 d-flex justify-content-center"><a
                                href="<?php echo e(route('Admin.Etudiant.formImport')); ?>" class="btn btn-primary"> <i
                                    class="fa fa-download" aria-hidden="true"></i> Importer</a>&ensp;
                            <?php if($etudiants->count() > 0): ?>
                                <form action="<?php echo e(route('Admin.etudiant.formExport')); ?>" method="get">
                                    <?php if(isset($filiere_id) && isset($niveau_id)): ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="niveau_id" value="<?php echo e($niveau_id); ?>">
                                        <input type="hidden" name="filiere_id" value="<?php echo e($filiere_id); ?>">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"
                                                aria-hidden="true"></i> Exporter</button>
                                    <?php elseif(isset($filiere_id) && !isset($niveau_id)): ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="filiere_id" value="<?php echo e($filiere_id); ?>">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"
                                                aria-hidden="true"></i> Exporter</button>
                                    <?php elseif(!isset($filiere_id) && isset($niveau_id)): ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="niveau_id" value="<?php echo e($niveau_id); ?>">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"
                                                aria-hidden="true"></i> Exporter</button>
                                    <?php else: ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"
                                                aria-hidden="true"></i> Exporter</button>
                                    <?php endif; ?>
                                </form>
                            <?php endif; ?>
                        </div>
                        <div class="col-12"><a href="<?php echo e(route('Admin.etudiant.create')); ?>"> <i class="fa fa-plus"
                                    aria-hidden="true"></i> Ajouter un nouveau Etudiant</a>
                        </div>


                        <div class="row ">
                            <div class="col-md-7 ">
                                <form action="<?php echo e(route('Admin.etudiant.show')); ?>" method="get"
                                    class="row d-flex align-items-center">
                                    <?php echo csrf_field(); ?>

                                    <div class="col-6 row ">
                                        <div class="col-12">
                                            <label for="" class="form-label">Filiere:</label>
                                            <select name="filiere_id" id="" class="form-select">
                                                <option value="">Selectionner un champ</option>
                                                <?php if(isset($filiere_id)): ?>
                                                    <?php $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($filiere->id == $filiere_id): ?>
                                                            <option value="<?php echo e($filiere->id); ?>" selected>
                                                                <?php echo e($filiere->intitule); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($filiere->id); ?>"><?php echo e($filiere->intitule); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($filiere->id); ?>"><?php echo e($filiere->intitule); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="" class="form-label">Niveau :</label>
                                            <select name="niveau_id" id="" class="form-select">
                                                <option value="">Selectionner Un champs</option>
                                                <?php if(isset($niveau_id)): ?>
                                                    <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $niveau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($niveau->id == $niveau_id): ?>
                                                            <option value="<?php echo e($niveau->id); ?>" selected>
                                                                <?php echo e($niveau->intitule); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($niveau->id); ?>">
                                                                <?php echo e($niveau->intitule); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $niveau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($niveau->id); ?>"><?php echo e($niveau->intitule); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <button type="submit" class="btn text-light"
                                            style="background: #012970;">Filtrer</button>
                                    </div>
                                </form>
                            </div>

                            <div class="search-barss col-md-5">
                                <?php if($etudiants->count() > 0): ?>
                                    <br>
                                    <form class="search-forms d-flex w-100 align-items-center" method="GET" action="#"
                                        class="row">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" name="search" id="search"
                                            placeholder="Recherche d'un etudiant"
                                            onkeyup="fetchEtudiant(document.getElementById('search').value)"
                                            title="Enter search keyword" class="w-100">
                                        <button type="submit" title="Searchs"><i class="bi bi-search"></i></button>
                                    </form>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php if(isset($ajout_nom)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e($ajout_nom); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        

                        <br>
                        <?php if($etudiants->count() > 0): ?>
                            <!-- Dark Table -->
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Noms</th>
                                        <th scope="col">Matricule</th>
                                        <th scope="col">filiere</th>
                                        <th scope="col">Niveau</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodys">
                                    <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="sid<?php echo e($etudiant->id); ?>">
                                            <th scope="row"><?php echo e($n); ?></th>
                                            <td><?php echo e($etudiant->noms); ?></td>
                                            <td><?php echo e($etudiant->matricule); ?></td>
                                            <td><?php echo e($etudiant->filiere->code); ?></td>
                                            <td><?php echo e($etudiant->niveau->code); ?>&ensp; &ensp; <a href="javascript:void(0)" onclick="editNiveauEtudiant(<?php echo e($etudiant->id); ?>)"><i class="fa-solid fa-plus-minus text-danger fs-6"></i></a></td>
                                            <td><a onclick="return confirm('Voulez vous reinitialiser le mot de passe de cet etudiant ?')"
                                                    href="<?php echo e(route('Admin.etudiant.reset', $etudiant->id)); ?>"
                                                    class="btn btn-warning"><i class="fa-solid fa-repeat"></i>
                                                     </a>&ensp;&ensp;
                                                <a href="javascript:void(0)" onclick="editEtudiant(<?php echo e($etudiant->id); ?>)"
                                                    class="btn btn-danger"><i class="fa fa-edit"
                                                        aria-hidden="true"></i></a>&ensp;&ensp;&ensp;
                                                <a onclick="return confirm('Voulez vous supprimer cet etudiant et avec tout sont contenu?')"
                                                    href="<?php echo e(route('Admin.etudiant.delete', $etudiant->id)); ?>"
                                                    class="btn btn-secondary"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></i></a>
                                            </td>

                                        </tr>
                                        <div style="display:none;"><?php echo e($n += 1); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination justify-content-center" id="pagination">
                                    <?php echo e($etudiants->links()); ?>

                                    
                            </div>
                        <?php else: ?>
                            <div>Vous n'avez pas encore ajouter d'etudiant

                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div>R.A.S</div>
                    <?php endif; ?>

                </div>


            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('layouts.modals.gestionEtudiant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/admin/gestionEtudiant.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/admin/gestionEtudiant/index.blade.php ENDPATH**/ ?>