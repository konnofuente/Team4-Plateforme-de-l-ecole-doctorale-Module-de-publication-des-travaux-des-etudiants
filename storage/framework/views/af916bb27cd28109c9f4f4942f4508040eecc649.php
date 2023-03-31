
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Enregistrement d'un Jury</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole doctorat</li>
                    <li class="breadcrumb-item active">Jury</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center; font-size:30px">Enregistrement d'un Jury
                </h5>

                <!-- Horizontal Form -->
                <!-- End Horizontal Form -->

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <br>

                <!-- Multi Columns Form -->
                <form class="row g-3" method="POST" action="<?php echo e(route('Ecole_Doctorat.jury.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="col-12 text-capitalize">
                        <label for="inputName5" class="form-label">Nom</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['noms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('noms')); ?>" id="inputName5" required name="noms" autofocus
                            placeholder="Entrez le nom svp">
                        <?php $__errorArgs = ['noms'];
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
                    <div class="col-md-6 text-capitalize">
                        <label for="textereadescription" class="form-label">telephone </label>
                        <input type="number" name="telephone" id="telephone" value="<?php echo e(old('telephone')); ?>" autofocus
                            class="form-control <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Entrez le numero de telephone">
                        <?php $__errorArgs = ['telephone'];
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
                    <div class="col-md-6 text-capitalize">
                        <label for="textereadescription" class="form-label">Email </label>
                        <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" autofocus
                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Entrez l'email">
                        <?php $__errorArgs = ['email'];
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
                    <div class="col-md-6 text-capitalize">
                        <label for="textereadescription" class="form-label">Grade </label>
                        <select name="grade" id="grade" class="form-select <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('grade')); ?>">
                            <option value="">Selectionner un champs</option>
                            <option value="Assistant">Assistant</option>
                            <option value="charge de cours">Charge de Cours</option>
                            <option value="Maitre de Conference">Maitre de Conference</option>
                            <option value="Professeur">Professeur</option>
                        </select>
                        <?php $__errorArgs = ['grade'];
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
                    <div class="col-md-6 text-capitalize">
                        <label for="textereadescription" class="form-label">Universite </label>
                        <select name="universite" id="universite"
                            class="form-select <?php $__errorArgs = ['universite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">selectionner un champs</option>
                            <option value="UY1">Universite de Yaounde I</option>
                        </select>
                        <?php $__errorArgs = ['universite'];
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
                    <div class="col-md-6 text-capitalize">
                        <label for="textereadescription" class="form-label"> Faculte</label>
                        <select name="faculte" id="faculte"
                            class="form-select <?php $__errorArgs = ['faculte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">selectionner un champs</option>
                            <option value="FACSCIENCE">Faculte de Science</option>
                        </select>
                        <?php $__errorArgs = ['faculte'];
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
                    <div class="col-md-6 text-capitalize">
                        <label for="textereadescription" class="form-label">Departement </label>
                        <select name="departement" id=""
                            class="form-select <?php $__errorArgs = ['departement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">Selectionner un champs</option>
                            <?php $__currentLoopData = $departements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(old('departement') == $departement->code): ?>
                                    <option value="<?php echo e($departement->code); ?>" selected><?php echo e($departement->intitule); ?>

                                    </option>
                                <?php else: ?>
                                    <option value="<?php echo e($departement->code); ?>"><?php echo e($departement->intitule); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['departement'];
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
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enregistre</button>
                        <button type="reset" class="btn btn-secondary">Effacer</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/juries/create.blade.php ENDPATH**/ ?>