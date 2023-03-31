

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarAdminIndex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Ajout d'un Utilisateur</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Gestion Utilisateur</li>
                </ol>
            </nav>

        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center text-capitalize" style="font-size:30px">Enregistrement d'un Nouveau
                    Utilisateur
                </h1>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <br>

                <!-- Multi Columns Form -->
                <form class="row g-3" method="POST" action="<?php echo e(route('Admin.Utilisateur.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Enseignant</th>
                                <th scope="col">Profil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php if(Auth::user()->profil_id == 0): ?>
                                        <div class="">
                                            <label for="" class="form-label">Enseignant :</label>
                                            <select name="enseignant_id" id="" required
                                                class="form-select <?php $__errorArgs = ['enseignant_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                <?php if(!isset($enseignant_id)): ?> autofocus <?php endif; ?>>
                                                <option value="">Selectionner un champ</option>
                                                <?php if(isset($enseignant_id)): ?>
                                                    <?php $__currentLoopData = $enseignants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($enseignant->id == $enseignant_id): ?>
                                                            <option value="<?php echo e($enseignant->id); ?>" selected>
                                                                <?php echo e($enseignant->noms); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($enseignant->id); ?>"><?php echo e($enseignant->noms); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $enseignants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(old('enseignant_id') == $enseignant->id): ?>
                                                            <option value="<?php echo e($enseignant->id); ?>" selected>
                                                                <?php echo e($enseignant->noms); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($enseignant->id); ?>"><?php echo e($enseignant->noms); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <?php $__errorArgs = ['enseignant_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="">
                                            <label for="" class="form-label">Enseignant :</label>
                                            <select name="charge_td_id" id="" required
                                                class="form-select <?php $__errorArgs = ['charge_td_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                <?php if(!isset($charge_td_id)): ?> autofocus <?php endif; ?>>
                                                <option value="">Selectionner un champ</option>
                                                <?php if(isset($charge_td_id)): ?>
                                                    <?php $__currentLoopData = $enseignants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($enseignant->id == $charge_td_id): ?>
                                                            <option value="<?php echo e($enseignant->id); ?>" selected>
                                                                <?php echo e($enseignant->noms); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($enseignant->id); ?>"><?php echo e($enseignant->noms); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $enseignants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(old('charge_td_id') == $enseignant->id): ?>
                                                            <option value="<?php echo e($enseignant->id); ?>" selected>
                                                                <?php echo e($enseignant->noms); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($enseignant->id); ?>"><?php echo e($enseignant->noms); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <?php $__errorArgs = ['charge_td_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="col-12">
                                        <label for="" class="form-label">Profil</label>
                                        <select onchange="charger()" name="profil_id" id="profil_id" required
                                            class="form-select <?php $__errorArgs = ['profil_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="">Selectionner un champ</option>
                                            <?php if(Auth::user()->profil_id == 0): ?>
                                                <option value="0">Super Admin</option>
                                                <option value="1">Doyen Ecole Doctorat</option>
                                                <option value="2">Chef du departement</option>
                                                <option value="3">Enseignant</option>
                                                <option value="4">Secretaire</option>
                                            <?php else: ?>
                                                <option value="5">Charge de TD</option>
                                            <?php endif; ?>
                                        </select>
                                        <?php $__errorArgs = ['profil_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <div class="departement specifie_collapase" id="departement">
                                            <?php if($departements !=null): ?>
                                            <br>
                                                <label for="" class="form-label">Departement</label>
                                                <select name="departement_id" id="departement_id"
                                                    class="form-select <?php $__errorArgs = ['departement_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <option value="">Selectionner un champ</option>
                                                    <?php $__currentLoopData = $departements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($departement->id); ?>">
                                                            <?php echo e($departement->intitule); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['departement_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="col-12">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="" class="form-control"
                            placeholder="Entrez un mot de passe pars defaut">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enregistre</button>
                        <button type="reset" class="btn btn-secondary">Effacer</button>
                    </div>
                </form>

            </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        function charger() {
                let val_titre = document.getElementById('profil_id').value
                let specifier = document.getElementById('departement')
                if (val_titre == 2 || val_titre==4) {
                    specifier.classList.remove('specifie_collapase')
                    $("#departement_id").attr('required', 'required');


                } else {
                    specifier.classList.add('specifie_collapase')
                    $("#departement_id").removeAttr('required');
                }
            }
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/admin/gestionUtilisateur/create.blade.php ENDPATH**/ ?>