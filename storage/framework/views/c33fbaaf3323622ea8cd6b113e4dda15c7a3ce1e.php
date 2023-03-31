
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarDonneeedebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Form Unite de Recherche</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Donnée de base</li>
                    <li class="breadcrumb-item active">Unite de Recherche</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center; font-size:30px">Enregistrement d'une nouvelle unite de
                    recherche
                </h5>

                <!-- Horizontal Form -->
                <!-- End Horizontal Form -->

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <br>

                <!-- Multi Columns Form -->
                <form class="row g-3" method="POST" action="<?php echo e(route('Ecole_Doctorat.unite_recherche.store')); ?>" id="formContainType">
                    <?php echo csrf_field(); ?>
                    <div class="row" id="modelForm">
                        <div class="col-md-6 text-capitalize">
                            <label for="inputName5" class="form-label">Code</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('code')); ?>" id="inputName5" autocomplete="code" required name="code[]"
                                autofocus placeholder="Entrez le code de l'unite de Recherche">
                            <?php $__errorArgs = ['code'];
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
                            <label for="textereadescription" class="form-label">Intitule</label>
                            <input type="text" name="intitule[]" id="intitule" value="<?php echo e(old('intitule')); ?>" required
                                autofocus class="form-control <?php $__errorArgs = ['intitule'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Entrez l'intituler de l'unite de recherche">
                            <?php $__errorArgs = ['intitule'];
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
                    </div>
                    <div id="buttonArea" class="text-end">
                        <button onclick="del()" type="button" id="supButton" class="btn btn-dark">
                            Annuler
                        </button>&ensp;
                        <button onclick="add()" type="button" class="btn btn-success" id="addButton">
                            Ajouter
                        </button>
                    </div>
                    <div class="text-center" id="footerContainType">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>&ensp;
                        <button type="reset" class="btn btn-secondary">Effacer</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/ecoleDoctorat/ajoutUniteRe.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/unite_recherche/create.blade.php ENDPATH**/ ?>