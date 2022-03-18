<div class="contianer">
    <?php $validation =  \Config\Services::validation();
    $profil = model('ProfilModel')->findAll()
    ?>

    <form action="SignupController/store" method="post" enctype="multipart/form-data">

        <div class="form-group mb-3 ">
            <?php
             helper('form');
        
            ?>
            <input type="text" name="nom" placeholder="Votre nom" value="<?=  set_value('nom')?>" class="form-control shadow shadow <?php if ($validation->getError('nom')) : ?>is-invalid<?php endif ?>">
            <?php if ($validation->getError('nom')) : ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('nom') ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="form-group mb-3">
            <input type="text" name="prenom" placeholder="votre prenom" class="form-control shadow">

        </div>
        <div class="form-group mb-3">
            <input type="text" name="telephone" placeholder="Numéro de téléphone" class="form-control shadow">

        </div>
        <div class="form-group mb-3">
            <input type="text" name="username" placeholder="nom d'utilisateur" class="form-control shadow">

        </div>
        <div class="form-group mb-3">
            <input type="password" name="password" placeholder="choisir un mot de passe" class="form-control shadow">

        </div>
        <div class="form-group mb-3">
            <input type="password" name="confirmpassword" placeholder="confirmer le mot de pass choisie" class="form-control shadow">

        </div>
        <div class="form-group mb-3">
            <select name="user_type" id="" class="form-control shadow">

            </select>

        </div>

        <div class="form-group mb-3">
            <input type="file" name="avatar" placeholder="user_avtar" class="form-control shadow">


        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Inscription</button>
        </div>
    </form>
</div>