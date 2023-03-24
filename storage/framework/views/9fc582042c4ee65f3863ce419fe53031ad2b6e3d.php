
<?php $__env->startSection('content'); ?>
    <div>
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($doc->theme); ?></h3>
        <p><?php echo e($doc->members); ?> le <?php echo e($doc->created_at); ?></p>
        <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="bologna-list">
            <li class="nav-item">
                <a class="nav-link active" href="#abstract<?php echo e($doc->id); ?>">Abstract</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#authors<?php echo e($doc->id); ?>">Authors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#references<?php echo e($doc->id); ?>">References</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#download<?php echo e($doc->id); ?>">Full text pdf</a>
            </li>
            </ul>
        </div>
        <div class="card-body">
        <div class="tab-content mt-3">
              <div class="tab-pane active" id="abstract<?php echo e($doc->id); ?>" role="tabpanel">
                <p class="card-text"><?php echo e($doc->abstract); ?></p>
              </div>

              <div class="tab-pane" id="authors<?php echo e($doc->id); ?>" role="tabpanel" aria-labelledby="history-tab">
                <p class="card-text"><?php echo e($doc->members); ?></p>
                <a href="#" class="card-link text-danger">Read more</a>
              </div>

              <div class="tab-pane" id="references<?php echo e($doc->id); ?>" role="tabpanel" aria-labelledby="deals-tab">
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum sapiente iusto ullam eligendi numquam fuga error provident quaerat architecto placeat sed necessitatibus officiis reprehenderit, quam, ea nemo facere consequatur fugiat.</p>
                <a href="#" class="btn btn-danger btn-sm">Get Deals</a>
              </div>
              <div class="tab-pane" id="download<?php echo e($doc->id); ?>" role="tabpanel" aria-labelledby="deals-tab">

                <a href="<?php echo e(route('visitor.downloadPdf',['filePath'=>$doc->memoire_path])); ?>" class="btn btn-danger btn-sm">Download PDF</a>
              </div>
            </div>
        </div>
        <div class="card-header">
<p>This is the footer</p>
        </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('#bologna-list a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')})
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.visitor.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/visiteur/viewAllDocs.blade.php ENDPATH**/ ?>