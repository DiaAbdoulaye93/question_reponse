<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inscription</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Inscription</h2>
                <?php $validation =  \Config\Services::validation();
                $profil = model('ProfilModel')->findAll();
                ?>
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                    <div class="form-group mb-3 ">

                        <input type="text" name="nom" placeholder="Votre nom" value="<?= set_value('nom') ?>" class="form-control shadow shadow <?php if ($validation->getError('nom')) : ?>is-invalid<?php endif ?>">
                        <?php if ($validation->getError('nom')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nom') ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="prenom" placeholder="votre prenom" value="<?= set_value('prenom') ?>" class="form-control shadow <?php if ($validation->getError('prenom')) : ?>is-invalid<?php endif ?>">
                        <div class="invalid-feedback"><?= $validation->getError('prenom') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="telephone" placeholder="Numéro de téléphone" value="<?= set_value('telephone') ?>" class="form-control shadow <?php if ($validation->getError('telephone')) : ?>is-invalid<?php endif ?>">
                        <div class="invalid-feedback"><?= $validation->getError('telephone') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="username" placeholder="nom d'utilisateur" value="<?= set_value('username') ?>" class="form-control shadow  <?php if ($validation->getError('username')) : ?>is-invalid<?php endif ?>">
                        <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="choisir un mot de passe" class="form-control shadow  <?php if ($validation->getError('password')) : ?>is-invalid<?php endif ?>">
                        <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="confirmer le mot de pass choisie" class="form-control shadow  <?php if ($validation->getError('confirmpassword')) : ?>is-invalid<?php endif ?>">
                        <div class="invalid-feedback"><?= $validation->getError('confirmpassword') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <select name="user_type" id="" class="form-control shadow <?php if ($validation->getError('user_type')) : ?>is-invalid<?php endif ?>"">
                            <option value=""></option>
                            <?php foreach ($profil as $OneProfil) : ?>
                                <option value=<?php echo $OneProfil['id']  ?> <?php echo set_select('user_type',  $OneProfil['id']) ?>;>
                                    <?php echo $OneProfil['libelle'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('user_type') ?></div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>