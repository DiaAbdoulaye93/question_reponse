<div class="content p-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="assets/images/logginbg.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-6 text-center text-success">
              <h3>Authentification</h3>
            </div>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Email" value="<?= set_value('username') ?>" class="form-control">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Mot de pass</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Se souvenir de moi</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">mot de pass oublié ?</a></span> 
              </div>

              <input type="submit" value="Connection" class="btn btn-block bg-success">

              <span class="text-center"> Pas encore inscrit ? cliquez <a data-toggle="modal" class="btn" data-target="#addModal">ici </a></span>
         
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
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