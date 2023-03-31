
<div class="modal fade" id="editUniteRechercheModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger bg-danger">
                <h5 class="modal-title h3 text-lg-start text-center text-light" style=" font-weight:bolder;">Formulaire de
                    Modification d'une Unite de Recherche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="" method="post" id="editUniteRechercheForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">code</label>
                        <input type="text" class="form-control" required name="code" id="code"
                            placeholder="SVP Entrez le code de l'unite de Recherche">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">intitule</label>
                        <input type="text" class="form-control" name="intitule" required id="intitule" placeholder="SVP entrez l'intitule de l'unite de recherche">
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
<?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/layouts/modals/uniteRecherche.blade.php ENDPATH**/ ?>