
            <div class="col-5">
                <h2>Inscription</h2>
                <?php $validation =  \Config\Services::validation();
                 $profil = model('ProfilModel')->findAll();
                 helper('form');
                ?>
                <form action="<?php site_url('/adduser') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3 ">

                        <input type="text" name="nom" placeholder="Votre nom" value="<?php (set_value('nom')) ?>" class="form-control shadow shadow <?php if ($validation->getError('nom')) : ?>is-invalid<?php endif ?>">
                        <?php if ($validation->getError('nom')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nom') ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="prenom" placeholder="votre prenom" value="<?php //set_value('prenom') ?>" class="form-control shadow <?php if ($validation->getError('prenom')) : ?>is-invalid<?php endif ?>">
                        <div class="invalid-feedback"><?= $validation->getError('prenom') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="telephone" placeholder="Numéro de téléphone" value="<?php //set_value('telephone') ?>" class="form-control shadow <?php if ($validation->getError('telephone')) : ?>is-invalid<?php endif ?>">
                        <div class="invalid-feedback"><?= $validation->getError('telephone') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="username" placeholder="nom d'utilisateur" value="<?php //set_value('username') ?>" class="form-control shadow  <?php if ($validation->getError('username')) : ?>is-invalid<?php endif ?>">
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
                        <select name="user_type" id="" class="form-control shadow <?php if ($validation->getError('user_type')) : ?>is-invalid<?php endif ?>">
                            <option value="">teste</option>
                            <?php foreach ($profil as $OneProfil) : ?>
                                <option value=<?php echo $OneProfil['id']  ?> <?= set_select('user_type',  $OneProfil['id']) ?>>
                                    <?php echo $OneProfil['libelle'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('user_type') ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="file" name="avatar" placeholder="user_avtar" class="form-control shadow">
                        

                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Inscription</button>
                    </div>

                </form>
            </div>
   