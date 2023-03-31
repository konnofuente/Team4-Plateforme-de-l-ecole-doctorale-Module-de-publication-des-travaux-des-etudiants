
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.admin.sidebarEcoleDoctorat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Messages</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('Admin.index')); ?>">Admin</a></li>
                    <li class="breadcrumb-item">Ecole Doctorat</li>
                    <li class="breadcrumb-item active">Messages</li>
                </ol>
            </nav>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center text-capitalize" style="font-size: 40px">Messages Envoyée</h1>

                    <!-- Horizontal Form -->
                    <!-- End Horizontal Form -->

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php if($messages->count() > 0): ?>
                        <br>




                        <br>

                        <!-- Dark Table -->
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Date d'envoie</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($message->id); ?>">
                                        <th scope="row"><?php echo e($n); ?></th>
                                        <td class=" text-break" style="width:25rem"><?php echo e($message->titre); ?></td>
                                        <td><?php echo e($message->created_at); ?></td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="voirMessage(<?php echo e($message->id); ?>)" class="btn btn-success"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Voir plus</a>&ensp;
                                            <a href="javascript:void(0)" onclick="editMessage(<?php echo e($message->id); ?>)"
                                                class="btn btn-danger"><i class="fa fa-edit" aria-hidden="true"></i> Update</a>&ensp;
                                            <a onclick="return confirm('Voulez vous supprimer se message et avec tout sont contenu?')"
                                                href="<?php echo e(route('Ecole_Doctorat.message.delete', $message->id)); ?>"
                                                class="btn btn-secondary"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></i>Delete</a>
                                        </td>

                                    </tr>
                                    <div style="display:none;"><?php echo e($n += 1); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            <?php echo e($messages->links()); ?>

                        </div>
                        <!-- End Dark Table -->
                    <?php else: ?>
                        <div>Vous n'avez pas encore ajouter de Message</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modals'); ?>
<?php echo $__env->make('ecoleDoctorat.message.voir', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.modals.dossiermessageupdate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/ecoleDoctorat/message.js')); ?>">
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/ecoleDoctorat/message/index.blade.php ENDPATH**/ ?>