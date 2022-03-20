<div class="container col-md-4 m-6">

    <div class="card push-top  shadow">
        <div class="card-header bg-success">
            Authentification
        </div>
        <div class="card-body">

            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                <div class="form-group mb-3">
                    <input type="text" name="username" placeholder="Email" value="<?= set_value('username') ?>" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>

                <div class="d-grid bg-success">
                    <button type="submit" class="btn">Connection</button>
                </div>
            </form>
        </div>
        <span class="text-center"> Pas encore inscrit ? cliquez <a data-toggle="modal" class="btn" data-target="#addModal">ici </a></span>
    </div>
</div>
</body>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-center text-light" id="exampleModalLabel">Inscription</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
    <script>
        $('.btn').click(function() {

            //element to be click to load the page in the div
            $('.modal-body').load('SignupController/index');

        });
    </script>

    </html>