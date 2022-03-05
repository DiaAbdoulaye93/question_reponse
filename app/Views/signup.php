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
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                <div class="form-group mb-3">
                        <input type="text" name="nom" placeholder="Votre nom" value="<?= set_value('nom') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="prenom" placeholder="votre prenom" value="<?= set_value('prenom') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="telephone" placeholder="Numéro de téléphone" value="<?= set_value('telephone') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="username" placeholder="nom d'utilisateur" value="<?= set_value('username') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="choisir un mot de passe" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="confirmer le mt de pass choisie" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                       <select name="user_type" id="" class="form-control">
                           <option value="">choisir un profil</option>
                           <option value="joueur">Joueur</option>
                           <option value="contributeur">Contributeur</option>
                       </select>
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