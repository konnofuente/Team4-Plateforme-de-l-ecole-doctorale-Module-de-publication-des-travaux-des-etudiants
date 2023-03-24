
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Liste de Dossiers</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active">Dossier</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Liste de Dossiers</h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <br><br>
                    <div class="row ">
                        <div class="col-md-7 ">
                            <form action="<?php echo e(route('Ecole_Doctorat.dossier.show')); ?>" method="get"
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
                                    <div class="col-12">
                                        <label for="" class="form-label">Etat:</label>
                                        <select name="status" id="" class="form-select">
                                            <option value="">Selectionner Un champs</option>
                                            <?php if(isset($status)): ?>
                                                <?php if($status == 1): ?>
                                                    <option value="1" selected>
                                                        Inscription</option>
                                                    <option value="2">Changement</option>
                                                    <option value="3">Authorisation</option>
                                                    <option value="4">Classement</option>
                                                <?php elseif($status == 2): ?>
                                                    <option value="1">Inscription</option>
                                                    <option value="2" selected>
                                                        Changement
                                                    </option>
                                                    <option value="3">Authorisation</option>
                                                    <option value="4">Classement</option>
                                                <?php elseif($status == 3): ?>
                                                    <option value="1">Inscription</option>
                                                    <option value="2">Changement</option>
                                                    <option value="3" selected>Authorisation</option>
                                                    <option value="4">Classement</option>
                                                <?php else: ?>
                                                    <option value="1">Inscription</option>
                                                    <option value="2">Changement</option>
                                                    <option value="3">Authorisation</option>
                                                    <option value="4" selected>Classement</option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <option value="1">Inscription</option>
                                                <option value="2">Changement</option>
                                                <option value="3">Authorisation</option>
                                                <option value="4">Classement</option>
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

                        <div class="search-barss col-md-5 row">
                            <br>
                            
                            <div class="col-12">
                                <button type="button" class="btn btn-info text-light" data-bs-toggle="modal"
                                    data-bs-target="#formNewsModal"> News</button>
                            </div>

                        </div>
                    </div>
                    <?php if($dossiers->count() > 0): ?>
                        <br>

                        <?php if(isset($email_valide)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e($email_valide); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($echec_email_pr) || isset($echec_email_en) || isset($echec_email_ex)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php if($echec_email_pr !=null): ?>
                                <?php echo e($echec_email_pr); ?> <br>
                                <?php endif; ?>
                                <?php if($echec_email_en !=null): ?>
                                <?php echo e($echec_email_en); ?> <br>
                                <?php endif; ?>
                                 <?php echo e($echec_email_ex); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
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
                                    <th scope="col">Jury</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Année</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                <?php $__currentLoopData = $dossiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dossier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($dossier->id); ?>"
                                        <?php if($dossier->status == 1): ?> class="text-secondary"
                                    <?php elseif($dossier->status == 2): ?>
                                        class="text-danger"
                                    <?php elseif($dossier->status == 3): ?>
                                        class="text-warning"
                                    <?php elseif($dossier->status == 4): ?>
                                        class="text-dark"
                                    <?php elseif($dossier->status == 5): ?>
                                            class="text-primary"
                                    <?php elseif($dossier->status == 6): ?>
                                            class="text-dark"
                                    <?php elseif($dossier->status == 7): ?>
                                        class="text-dark"
                                    <?php elseif($dossier->status == 8): ?>
                                        class="text-success"
                                    <?php else: ?> <?php endif; ?>>
                                        <th scope="row"><?php echo e($n); ?></th>
                                        <td><?php echo e($dossier->etudiant['noms']); ?></td>
                                        <td><?php echo e($dossier->etudiant['matricule']); ?></td>
                                        <td><?php echo e($dossier->unite_recherche['code']); ?></td>
                                        <td class=" text-break" style="width:15rem"><?php echo e($dossier->niveau->code); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-eye"
                                                        aria-hidden="true"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><?php echo e($dossier->theme_recherche); ?> &ensp; <a
                                                            href="javascript:void(0)"
                                                            onclick="editTheme(<?php echo e($dossier->id); ?>)"> <i
                                                                class="fa fa-edit text-danger" aria-hidden="true"></i></a>
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
                                                    <li><span id="encadreur<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                                                href="<?php echo e(route('Ecole_Doctorat.jury.voir', $dossier->encadreur->id)); ?>"><?php echo e($dossier->encadreur['noms']); ?></a></span>
                                                        &ensp;
                                                        &ensp; <a href="javascript:void(0)"
                                                            onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'encadreur')"> <i
                                                                class="fa fa-edit text-danger" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <?php if($dossier->coEncadreur != null): ?>
                                                        <li><span id="coencadreur<?php echo e($dossier->id); ?>"><a
                                                                    class="dropdown-item"
                                                                    href="<?php echo e(route('Ecole_Doctorat.jury.voir', $dossier->coEncadreur->id)); ?>"><?php echo e($dossier->coEncadreur['noms']); ?></a></span>&ensp;
                                                            &ensp;<a href="javascript:void(0)"
                                                                onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'coencadreur')">
                                                                <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                                                            </a> &ensp; &ensp; <a
                                                                onclick="return confirm('Voulez vous supprimer se co-Encadreur?')"
                                                                href="/Ecole_Doctorat/Dossier/delete/<?php echo e($dossier->id); ?>/coencadreur"><i
                                                                    class="fa fa-trash text-secondary"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                    <?php else: ?>
                                                        <li><span id="coencadreur<?php echo e($dossier->id); ?>"> <a
                                                                    class="dropdown-item" href="javascript:void(0)"
                                                                    onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'coencadreur')">Ajouter
                                                                    un co-Encadreur</a></span>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if($dossier->cooEncadreur != null): ?>
                                                        <li id="cooencadreur<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                                                href="<?php echo e(route('Ecole_Doctorat.jury.voir', $dossier->cooEncadreur->id)); ?>"><?php echo e($dossier->cooEncadreur['noms']); ?></a>
                                                            &ensp; &ensp;
                                                            <a href="javascript:void(0)"
                                                                onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'cooencadreur')">
                                                                <?php if($dossier->status == 1): ?>
                                        <td> Inscription</td>
                                    <?php elseif($dossier->status == 2): ?>
                                        <td>Changement</td>
                                    <?php elseif($dossier->status == 3): ?>
                                        <td>Authorisation</td>
                                    <?php elseif($dossier->status == 4): ?>
                                        <?php if($dossier->examinateur_jury == null && $dossier->president_jury == null): ?>
                                            <td>Authorisation</td>
                                        <?php else: ?>
                                            <td>Authorisation</td>
                                        <?php endif; ?>
                                    <?php elseif($dossier->status == 5): ?>
                                        <td>Authorisation</td>
                                    <?php elseif($dossier->status == 6): ?>
                                        <td>Authorisation</td>
                                    <?php elseif($dossier->status == 7): ?>
                                        <td>Authorisation</td>
                                    <?php elseif($dossier->status == 8): ?>
                                        <td>Classement</td>
                                    <?php else: ?>
                                        <td>-</td>
                                <?php endif; ?> <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                                </a>&ensp;&ensp;<a onclick="return confirm('Voulez vous supprimer se coo-Encadreur?')"
                                    href="/Ecole_Doctorat/Dossier/delete/<?php echo e($dossier->id); ?>/cooencadreur"><i
                                        class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
                                </li>
                            <?php else: ?>
                                <li id="cooencadreur<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                        href="javascript:void(0)"
                                        onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'cooencadreur')">Ajouter
                                        un coo-Encadreur</a>
                                </li>
                    <?php endif; ?>
                    </ul>
                </div>
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fa-solid fa-users"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <?php if($dossier->president_jury != null): ?>
                                <li id="president_jury<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                        href="<?php echo e(route('Ecole_Doctorat.jury.voir', $dossier->president_jury->id)); ?>"><?php echo e($dossier->president_jury['noms']); ?></a>&ensp;
                                    &ensp;
                                    <a href="javascript:void(0)"
                                        onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'president_jury')">
                                        <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                                    </a>&ensp;&ensp;<a
                                        onclick="return confirm('Voulez vous supprimer se President du jury?')"
                                        href="/Ecole_Doctorat/Dossier/delete/<?php echo e($dossier->id); ?>/president_jury"><i
                                            class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
                                </li>
                            <?php else: ?>
                                <li id="president_jury<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                        href="javascript:void(0)"
                                        onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'president_jury')">Ajouter
                                        le president du jury</a>
                                </li>
                            <?php endif; ?>
                            <?php if($dossier->examinateur_jury != null): ?>
                                <li id="examinateur<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                        href="<?php echo e(route('Ecole_Doctorat.jury.voir', $dossier->examinateur_jury->id)); ?>"><?php echo e($dossier->examinateur_jury['noms']); ?></a>&ensp;
                                    &ensp;
                                    <a href="javascript:void(0)"
                                        onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'examinateur')">
                                        <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                                    </a>&ensp;&ensp;<a onclick="return confirm('Voulez vous supprimer cet examinateur ?')"
                                        href="/Ecole_Doctorat/Dossier/delete/<?php echo e($dossier->id); ?>/examinateur"><i
                                            class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
                                </li>
                            <?php else: ?>
                                <li id="examinateur<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                        href="javascript:void(0)"
                                        onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'examinateur')">Ajouter
                                        un Examinateur</a>
                                </li>
                            <?php endif; ?>
                            <?php if($dossier->coexaminateur_jury != null): ?>
                                <li id="coexaminateur<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                        href="<?php echo e(route('Ecole_Doctorat.jury.voir', $dossier->coexaminateur_jury->id)); ?>"><?php echo e($dossier->coexaminateur_jury['noms']); ?></a>&ensp;
                                    &ensp;
                                    <a href="javascript:void(0)"
                                        onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'coexaminateur')">
                                        <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                                    </a>&ensp;&ensp;<a
                                        onclick="return confirm('Voulez vous supprimer se co-examinateur ?')"
                                        href="/Ecole_Doctorat/Dossier/delete/<?php echo e($dossier->id); ?>/coexaminateur"><i
                                            class="fa fa-trash text-secondary" aria-hidden="true"></i></a>
                                </li>
                            <?php else: ?>
                                <li id="coexaminateur<?php echo e($dossier->id); ?>"><a class="dropdown-item"
                                        href="javascript:void(0)"
                                        onclick="ajoutJuryPre(<?php echo e($dossier->id); ?>, 'coexaminateur')">Ajouter
                                        un co Examinateur</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </td>
                <?php if($dossier->status == 1): ?>
                    <td> Inscription</td>
                <?php elseif($dossier->status == 2): ?>
                    <td>Changement</td>
                <?php elseif($dossier->status == 3): ?>
                    <td>Authorisation</td>
                <?php elseif($dossier->status == 4): ?>
                    <?php if($dossier->examinateur_jury == null && $dossier->president_jury == null): ?>
                        <td>Authorisation</td>
                    <?php else: ?>
                        <td>Authorisation</td>
                    <?php endif; ?>
                <?php elseif($dossier->status == 5): ?>
                    <td>Authorisation</td>
                <?php elseif($dossier->status == 6): ?>
                    <td>Authorisation</td>
                <?php elseif($dossier->status == 7): ?>
                    <td>Authorisation</td>
                <?php elseif($dossier->status == 8): ?>
                    <td>Classement</td>
                <?php else: ?>
                    <td>-</td>
                <?php endif; ?>
                <td class=" text-break" style="width:15rem"><?php echo e($dossier->annee['libelle']); ?></td>
                <td>
                    <a href="<?php echo e(route('Ecole_Doctorat.etudiantDos.index', $dossier->id)); ?>"><i
                            class="fa fa-folder text-primary" aria-hidden="true"></i></a>&ensp;
                    &ensp;
                    <?php if($dossier->status == 1): ?>
                        <i class="fa-solid fa-envelope-circle-check text-secondary"></i>
                    <?php elseif($dossier->status == 2): ?>
                        <i class="fa-solid fa-envelope-circle-check text-secondary"></i>
                    <?php elseif($dossier->status == 3): ?>
                        <i class="fa-solid fa-envelope-circle-check text-secondary"></i>
                    <?php elseif($dossier->status == 4): ?>
                        <?php if($dossier->examinateur_jury == null || $dossier->president_jury == null): ?>
                            <i class="fa-solid fa-envelope-circle-check text-secondary"></i>
                        <?php else: ?>
                            <a onclick="return confirm('Voulez vous envoyer se dossier au membre de jury?')"
                                href="<?php echo e(route('Ecole_Doctorat.email.index', $dossier->id)); ?>"><i
                                    class="fa-solid fa-envelope-circle-check text-success"></i></a>
                        <?php endif; ?>
                    <?php elseif($dossier->status == 5 || $dossier->status == 6 || $dossier->status == 7): ?>
                        <i class="fa-solid fa-envelope-circle-check text-danger"></i>
                    <?php elseif($dossier->status == 8): ?>
                        <i class="fa-solid fa-envelope-circle-check text-dark"></i>
                    <?php elseif($dossier->status == 9): ?>
                        <i class="fa-solid fa-envelope-circle-check text-dark"></i>
                    <?php else: ?>
                        <i class="fa-solid fa-envelope-circle-check text-dark"></i>
                    <?php endif; ?> &ensp;
                    &ensp;
                    <i class="fa-solid fa-book-open-reader text-warning"></i>
                </td>

                </tr>
                <div style="display:none;"><?php echo e($n += 1); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
                <div class="pagination justify-content-center">
                    <?php echo e($dossiers->links()); ?>

                </div>
                <!-- End Dark Table -->
            <?php else: ?>
                <div>Pas de dossier pour le moment</div>
                <?php endif; ?>
            </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('layouts.modals.dossierjury', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.modals.dossierNew', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/ecoleDoctorat/dossier.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/dossier/index.blade.php ENDPATH**/ ?>