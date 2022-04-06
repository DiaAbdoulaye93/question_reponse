<?php $validation =  \Config\Services::validation();
$profil = model('ProfilModel')->findAll();
helper('form');
?>
<form action="<? //= site_url('/adduser')
                ?>" method="post" enctype="multipart/form-data" class="data">
    <div class="row">
        <div class="form-group mb-4 col-md-6">
            <input type="text" id="nom" name="nom" placeholder="Votre nom" value="<?php set_value('nom') ?>" class="form-control shadow <?php if ($validation->getError('nom')) : ?>is-invalid<?php endif ?>">
            <?php if ($validation->getError('nom')) : ?>
                <div class="invalid-feedback text-danger">
                    <?= $validation->getError('nom') ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="form-group mb-4 col-md-6">
            <input type="text" id="prenom" name="prenom" placeholder="votre prenom" value="<?php set_value('prenom')
                                                                                            ?>" class="form-control shadow <?php if ($validation->getError('prenom')) : ?>is-invalid<?php endif ?>">
            <div class="invalid-feedback text-danger"><?= $validation->getError('prenom') ?></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-4 col-md-6">
            <input type="text" id="telephone" name="telephone" placeholder="Numéro de téléphone" value="<?php set_value('telephone')
                                                                                                        ?>" class="form-control shadow <?php if ($validation->getError('telephone')) : ?>is-invalid<?php endif ?>">
            <div class="invalid-feedback text-danger"><?= $validation->getError('telephone') ?></div>
        </div>
        <div class="form-group mb-4 col-md-6">
            <input type="text" id="username" name="username" placeholder="nom d'utilisateur" value="<?php set_value('username')
                                                                                                    ?>" class="form-control shadow  <?php if ($validation->getError('username')) : ?>is-invalid<?php endif ?>">
            <div class="invalid-feedback text-danger"><?= $validation->getError('username') ?></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-4 col-md-6">
            <input type="password" id="password" name="password" placeholder="choisir un mot de passe" class="form-control shadow  <?php if ($validation->getError('password')) : ?>is-invalid<?php endif ?>">
            <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
        </div>
        <div class="form-group mb-4 col-md-6">
            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="confirmer le mot de pass choisie" class="form-control shadow  <?php if ($validation->getError('confirmpassword')) : ?>is-invalid<?php endif ?>">
            <div class="invalid-feedback text-danger"><?= $validation->getError('confirmpassword') ?></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-4 col-md-6">
            <select name="user_type" id="user_type" class="selectpicker form-control shadow <?php if ($validation->getError('user_type')) : ?>is-invalid<?php endif ?>" style="height:5ch" data-live-search="true">
                <option>------ Profil d'utilisateur------</option>
                    <?php foreach ($profil as $OneProfil) : ?>
                <option value=<?php echo $OneProfil['id']  ?> <?= set_select('user_type',  $OneProfil['id']) ?>>
                    <?php echo $OneProfil['libelle'] ?>
                </option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?= $validation->getError('user_type') ?></div>
        </div>
        <div class="form-group col-md-6">
            <input type="file" name="avatar" class="form-control shadow">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group  col-md-6">
            <button type="reset" class="btn btn-danger form-control">Reinitialiser</button>
        </div>
        <div class="form-group col-md-6">

            <button type="submit" class="btn form-control submit" style="background-color: #4ebfa6;">Soummetre</button>
        </div>
    </div>

</form>
</div>
<script>
    $(document).ready(function() {

        $('.data').submit(function(e) {
         
            // var form = $('.data')[0]; // You need to use standard javascript object here
            // var formData = new FormData(form);
            var nom = $("#nom").val();
            // var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url('/adduser') ?>",
                type: 'POST',
                data: {nom: nom},
                success: function(data) {
                      
                },
                error: function() {
                    alert("Please enter valid email id!");
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
    });
</script>