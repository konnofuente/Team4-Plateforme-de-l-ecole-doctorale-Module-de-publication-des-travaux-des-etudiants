
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Liste de Demande d'Inscription</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active">Inscription</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Liste de Demande
                        D'Inscription</h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <br><br>
                    <div class="row ">
                        <div class="col-md-7 ">
                            <form action="<?php echo e(route('Ecole_Doctorat.Inscription.show')); ?>" method="get"
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

                        
                    </div>
                    <?php if($inscriptions->count() > 0): ?>
                        <br>



                        <br>
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Noms & Prenom</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Unite de Recherche</th>
                                    <th scope="col">Niveau</th>
                                    <th scope="col">Theme</th>
                                    <th scope="col">Encadreur</th>
                                    <th scope="col">Année</th>
                                    <th scope="col">Validation</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                <?php $__currentLoopData = $inscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($inscription->id); ?>">
                                        <th scope="row"><?php echo e($n); ?></th>
                                        <td ><?php echo e($inscription->etudiant['noms']); ?>

                                        </td>
                                        <td><?php echo e($inscription->etudiant['matricule']); ?></td>
                                        <td><?php echo e($inscription->unite_recherche['code']); ?></td>
                                        <td class=" text-break" style="width:15rem"><?php echo e($inscription->niveau->code); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-eye"
                                                        aria-hidden="true"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><?php echo e($inscription->theme_recherche); ?>

                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa-solid fa-users"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="<?php echo e(route('Ecole_Doctorat.jury.voir', $inscription->encadreur->id)); ?>"><?php echo e($inscription->encadreur['noms']); ?></a>
                                                    </li>
                                                    <?php if($inscription->coEncadreur != null): ?>
                                                        <li><a class="dropdown-item"
                                                                href="<?php echo e(route('Ecole_Doctorat.jury.voir', $inscription->coEncadreur->id)); ?>"><?php echo e($inscription->coEncadreur['noms']); ?></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if($inscription->cooEncadreur != null): ?>
                                                        <li><a class="dropdown-item"
                                                                href="<?php echo e(route('Ecole_Doctorat.jury.voir', $inscription->cooEncadreur->id)); ?>"><?php echo e($inscription->cooEncadreur['noms']); ?></a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class=" text-break" style="width:15rem"><?php echo e($inscription->annee['libelle']); ?>

                                        </td>
                                        <td>
                                            <a onclick="return confirm('Voulez vous enregistre se dossier ?')"
                                                href="<?php echo e(route('Ecole_Doctorat.Inscription.update', $inscription->id)); ?>"><i
                                                    class="fa fa-check text-success" aria-hidden="true"></i></a>&ensp;
                                            &ensp;
                                            <a onclick="return confirm('Voulez vous supprimer se dossier?')"
                                                href="<?php echo e(route('Ecole_Doctorat.Inscription.delete', $inscription->id)); ?>"><i
                                                    class="fa-solid fa-circle-xmark text-danger"></i> </a>
                                        </td>

                                    </tr>
                                    <div style="display:none;"><?php echo e($n += 1); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            <?php echo e($inscriptions->links()); ?>

                        </div>
                        <!-- End Dark Table -->
                    <?php else: ?>
                        <div>Pas d'inscription pour le moment</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/inscription/index.blade.php ENDPATH**/ ?>