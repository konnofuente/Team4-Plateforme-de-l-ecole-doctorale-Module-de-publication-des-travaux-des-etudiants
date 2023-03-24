
<div class="modal fade" id="editDossierJuryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger bg-danger">
                <h5 class="modal-title h3 text-lg-start text-center text-light" style=" font-weight:bolder;">Formulaire de
                    Modification d'un Jury</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?php echo e(route('Ecole_Doctorat.dossier.update')); ?>" method="post" id="editDossierJuryForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="valeur" id="valeur">
                    <div class="mb-3">
                        <label for="textereadescription" class="form-label">Jury </label>
                        <select name="jury_id" id="jury_id" required
                            class="form-select <?php $__errorArgs = ['jury_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">Selectionner un champs</option>
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
<div class="modal fade" id="editDossierThemeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger bg-danger">
                <h5 class="modal-title h3 text-lg-start text-center text-light" style=" font-weight:bolder;">Formulaire de
                    Modification du Theme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?php echo e(route('Ecole_Doctorat.dossier.update_theme')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id_d">
                    <div class="mb-3">
                        <label for="textereadescription" class="form-label">Theme </label>
                        <textarea name="theme_recherche" id="theme_recherche"  rows="4" class="form-control"></textarea>
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
<?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/layouts/modals/dossierjury.blade.php ENDPATH**/ ?>