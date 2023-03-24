
<?php $__env->startSection('content'); ?>
<form method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
  <div class="form-row">
    <div class="form-group">
      <label for="theme">Theme du rpojet</label>
      <input type="text" class="form-control" id="theme" placeholder="Votre Theme" name="projet_theme">
    </div>
    <div class="form-group">
      <label for="abstract">Abstract</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
      name="projet_abstract"
      ></textarea>
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-6">
      <label for="projectMembers">Les membres du groupe (Separer par une vigule (,))</label>
      <textarea name="members" class="form-control" id="projectMembers" rows="3"
        placeholder="ex: Jhone Doe, Tristina Joe"
      ></textarea>
  </div>
  <div class="form-group col-md-6">
      <label for="domain">Domain/Type du projet</label>
      <input type="text" class="form-control" placeholder="ex: Science / Technologie / Geography" id="domain" name="domaine">
  </div>
  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="chefMat">Matricule du chef du projet</label>
      <input type="text" class="form-control" id="chefMat" name="chefMat">
    </div>
    <div class="form-group col-md-6">
      <label for="chefEmail">Email du chef</label>
      <input type="email" class="form-control" id="chefEmail" name="chefMail">
    </div>
    <div class="form-group col-md-6">
      <label for="chefTelephone">Telephone du chef</label>
      <input type="tel" class="form-control" id="chefTelephone" name="chefTel">
    </div>
  </div>

  <div class="row">
    <p><h3>Detailes de l'encadreur</h3></p>
    <div class="form-group col-md-4">
      <label for="emailEncadreur">Email de l'encadreur</label>
      <input type="email" class="form-control" id="emailEncadreur" name="emailEncadreur">
    </div>
    <div class="form-group col-md-4">
      <label for="telEncadreur">Telephone de l'encadreur</label>
      <input type="tel" id="telEncadreur" class="form-control"
      name="telEncadreur">
    </div>
    <div class="form-group col-md-4">
      <label for="matriculeEncadreur">Matricule de l'encadreur</label>
      <input type="text" class="form-control"  id="matriculeEncadreur" name="matriculeEncadreur">
    </div>
  </div>

  <div class="row">
    <p><h3>Documents a soummetre</h3></p>
    <div class="form-group col-md-4">
      <label for="attestationDoc">Attestation de soutenance</label>
      <input type="file" class="form-control" id="attestationDoc" name="attestation_doc">
    </div>
    <div class="form-group col-md-4">
      <label for="memoireDoc">Document Memoire</label>
      <input type="file" id="memoireDoc" class="form-control" name="memoire_doc">
    </div>
    <div class="form-group col-md-4">
      <label for="inscriptionDoc">Fiche d'inscription</label>
      <input type="file" class="form-control"  id="inscriptionDoc" name="inscription-doc">
    </div>
  </div>

  <div class="form-group" style="padding:20px 0px;">

      <button type="submit" class="btn btn-primary">Soummetre</button>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.visitor.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Team4-Plateforme-de-l-ecole-doctorale-Module-de-publication-des-travaux-des-etudiants\resources\views/visiteur/submitDoc.blade.php ENDPATH**/ ?>