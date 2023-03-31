<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
<div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="bologna-list">
            <li class="nav-item">
                <a class="nav-link active" href="#abstract">Abstract</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#authors">Authors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#references">References</a>
            </li>
            </ul>
        </div>
        <div class="card-body">
        <div class="tab-content mt-3">
              <div class="tab-pane active" id="abstract" role="tabpanel">
                <p class="card-text"><?php echo(substr($selectedProject->abstract, 0, 500))?></p>
              </div>

              <div class="tab-pane" id="authors" role="tabpanel" aria-labelledby="history-tab">
                <p class="card-text"><?php echo e($selectedProject->members); ?></p>
                <a href="#" class="card-link text-danger">Read more</a>
              </div>

              <div class="tab-pane" id="references" role="tabpanel" aria-labelledby="deals-tab">
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum sapiente iusto ullam eligendi numquam fuga error provident quaerat architecto placeat sed necessitatibus officiis reprehenderit, quam, ea nemo facere consequatur fugiat.</p>
                <a href="#" class="btn btn-danger btn-sm">Get Deals</a>
              </div>
            </div>
        </div>
        <div class="card-footer">
            <p>This is the footer</p>
        </div>
        </div>
    <div style="margin:100px 0px; background-color:white; padding:20px 20px; border-radius:10px;box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
        <h1 align="center" style="margin:20px 0px">Attestation de soutenance</h1>
        <div>
        <embed src="<?php echo e(asset("uploads/themes/$selectedProject->theme/attestation/$selectedProject->attestation_path")); ?>" type="application/pdf" width="100%" height="600px" >
        </div>
    </div>

    <div style="margin:100px 0px; background-color:white; padding:20px 20px; border-radius:10px;box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">
        <h1 align="center" style="margin:20px 0px">Document Memoire</h1>
        <div>
        <embed src="<?php echo e(asset("uploads/themes/$selectedProject->theme/memoire/$selectedProject->memoire_path")); ?>" type="application/pdf" width="100%" height="600px" >
        </div>
    </div>
    <div>
        <h4 align="center">DESCISION</h4>
        <div class="d-flex justify-content-around" >
                <button class="btn btn-success"><b>VALIDER</b></button>
                <button class="btn btn-danger"><b>REJETER</b></button>
        </div>

    </div>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#bologna-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')})
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/dossier/single.blade.php ENDPATH**/ ?>