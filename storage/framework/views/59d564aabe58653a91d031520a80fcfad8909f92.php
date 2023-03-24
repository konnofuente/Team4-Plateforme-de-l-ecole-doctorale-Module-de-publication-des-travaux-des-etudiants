<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php if(Auth::user()->profil_id != 1): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo e(route('Admin.index')); ?>">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Statisque</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->profil_id == 0 || Auth::user()->profil_id == 1): ?>
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#table-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-graduation-cap"></i><span>Ecole Doctorat</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="table-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.reporting')); ?>"
                            <?php if(isset($reporting)): ?> class="active" <?php endif; ?>>
                            <i class="bi bi-circle"></i><span>Reporting</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.dossier.index')); ?>"
                            <?php if(isset($dossier)): ?> class="active" <?php endif; ?>>
                            <i class="bi bi-circle"></i><span>Dossier <?php if(isset($dossier_nombre_1)): ?>
                                    <?php if($dossier_nombre_1 != 0): ?>
                                        <span class="text-success"><?php echo e($dossier_nombre_1); ?></span>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a
                            href="<?php echo e(route('Ecole_Doctorat.Inscription.index')); ?>"<?php if(isset($inscription_i)): ?> class="active" <?php endif; ?>>
                            <i class="bi bi-circle"></i><span>Inscription <?php if(isset($dossier_nombre)): ?>
                                    <?php if($dossier_nombre != 0): ?>
                                        <span class="text-success"><?php echo e($dossier_nombre); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?> </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.jury.index')); ?>"
                            <?php if(isset($jury_s)): ?> class="active" <?php endif; ?>>
                            <i class="bi bi-circle"></i><span>Jury</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.message.index')); ?>"
                            <?php if(isset($message_i)): ?> class="active" <?php endif; ?>>
                            <i class="bi bi-circle"></i><span>Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.archive.index')); ?>"
                            <?php if(isset($archive_i)): ?> class="active" <?php endif; ?>>
                            <i class="bi bi-circle"></i><span>Archive</span>
                        </a>
                    </li>

                </ul>
            </li>
        <?php endif; ?>

        <?php if(Auth::user()->profil_id == 1): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-database"></i><span>Donnée de base</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('Admin.etudiant.create')); ?>">
                            <i class="bi bi-circle"></i><span> Ajouter un Etudiant</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.unite_recherche.create')); ?>">
                            <i class="bi bi-circle"></i><span> Ajouter une Unite de Recherche</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-table-list"></i><span> Faculte </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.unite_recherche.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des Unites de Recherches</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Ecole_Doctorat.unite_recherche.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des Unites de Recherches</span>
                        </a>
                    </li>

                </ul>
            </li>
        <?php endif; ?>

        <?php if(Auth::user()->profil_id == 0 || Auth::user()->profil_id == 2 || Auth::user()->profil_id == 4): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-database"></i><span>Donnée de base</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('Admin.etudiant.create')); ?>">
                            <i class="bi bi-circle"></i><span> Ajouter un Etudiant</span>
                        </a>
                    </li>
                    <?php if(Auth::user()->profil_id == 0): ?>
                        <li>
                            <a href="<?php echo e(route('Admin.departement.create')); ?>">
                                <i class="bi bi-circle"></i><span> Ajouter un Departement</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('Admin.niveau.create')); ?>">
                                <i class="bi bi-circle"></i><span> Ajouter un Niveau</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('Ecole_Doctorat.unite_recherche.create')); ?>">
                                <i class="bi bi-circle"></i><span> Ajouter une Unite de Recherche</span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-table-list"></i><span>Faculte</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('Admin.departement.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Departements</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.filiere.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Filieres</span>
                        </a>
                    </li>
                    <?php if(Auth::user()->profil_id == 0): ?>
                        <li>
                            <a href="<?php echo e(route('Admin.niveau.index')); ?>">
                                <i class="bi bi-circle"></i><span>Gestion des Niveaux</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('Admin.etudiant.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Etudiants</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.ue.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des UEs</span>
                        </a>
                    </li>
                    <?php if(Auth::user()->profil_id == 0): ?>
                        <li>
                            <a href="<?php echo e(route('Ecole_Doctorat.unite_recherche.index')); ?>">
                                <i class="bi bi-circle"></i><span>Gestions des Unites de Recherches</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('Admin.attribution.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des Attributions</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.groupeTD.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des Groupes de TD</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.enseignant.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Enseignants</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.ChargeTd.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Charge de TD</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.club.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Clubs</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.requete.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Requetes</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(Auth::user()->profil_id == 3 || Auth::user()->profil_id == 5): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-table-list"></i><span> Faculte </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo e(route('Admin.departement.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Departements</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.filiere.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestion des Filieres</span>
                        </a>
                    </li>
                    <?php if(Auth::user()->profil_id == 0): ?>
                        <li>
                            <a href="<?php echo e(route('Admin.niveau.index')); ?>">
                                <i class="bi bi-circle"></i><span>Gestion des Niveaux</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('Admin.ue.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des UEs</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.attribution.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des Attributions</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('Admin.groupeTD.index')); ?>">
                            <i class="bi bi-circle"></i><span>Gestions des Groupes de TD</span>
                        </a>
                    </li>
                    <?php if(Auth::user()->profil_id == 3): ?>
                        <li>
                            <a href="<?php echo e(route('Admin.requete.index')); ?>">
                                <i class="bi bi-circle"></i><span>Gestion des Requetes</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('Admin.user.index')); ?>">
                <i class="fa-solid fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        <?php if(Auth::user()->profil_id == 0 || Auth::user()->profil_id == 2 || Auth::user()->profil_id == 4): ?>
            <li class="nav-item">
                <a class="nav-link <?php if(!isset($utilisateur_c)): ?> collapsed <?php endif; ?> "
                    href="<?php echo e(route('Admin.Utilisateur.create')); ?>">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <span>Ajout Utilisateur</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(!isset($utilisateur_c)): ?> collapsed <?php endif; ?> "
                    href="<?php echo e(route('Admin.Utilisateur.index')); ?>">
                    <i class="fa-solid fa-users-between-lines"></i>
                    <span>Liste des Utilisateurs</span>
                </a>
            </li>
        <?php endif; ?>



    </ul>

</aside>
<?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/layouts/admin/sidebarEcoleDoctorat.blade.php ENDPATH**/ ?>