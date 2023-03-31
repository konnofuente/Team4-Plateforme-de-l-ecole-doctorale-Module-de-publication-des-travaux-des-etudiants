
<div class="modal fade" id="editJuryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger bg-danger">
                <h5 class="modal-title h3 text-lg-start text-center text-light" style=" font-weight:bolder;">Formulaire de
                    Modification d'un Jury</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="" method="post" id="editJuryForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="noms" required id="noms"
                            placeholder="SVP entrez le nom de l'Etudiant">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Email </label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Grade</label>
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
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Telephone</label>
                        <input type="number" class="form-control" maxlength="9" name="telephone" id="telephone">
                    </div>
                    <div class="mb-3">
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
                    </div>
                    <div class="mb-3">
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
                    </div>
                    <div class="mb-3">
                        <label for="textereadescription" class="form-label">Departement </label>
                        <select name="departement" id="departement"
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
                                <option value="<?php echo e($departement->code); ?>"><?php echo e($departement->intitule); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistre</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/layouts/modals/jury.blade.php ENDPATH**/ ?>