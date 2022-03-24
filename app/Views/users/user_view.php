<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<div class="container">

    <h2 class="text-center mt-4 mb-4">Liste des utilisitateurs</h2>

    <?php

    $session = \Config\Services::session();
   
    ?><script>
        $(function() {
            <?php if (session()->has("success")) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Great!',
                    text: '<?= session("success") ?>'
                })
            <?php }
            if (session()->has("error")) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oups!',
                    text: '<?= session("error") ?>'
                })
            <?php } ?>
        });
    </script>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-right">
                     
                     <button type="button" class="btn mb-2  bg-success text-light" data-toggle="modal" data-target="#addModal">Nouvel utilisitateur <i class="fa fa-user-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-nowrap" id="userliste">
                    <thead class="table-success">
                        <tr>
                            <th>Utilisateur</th>
                            <th>Telephone</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($user) {
                            foreach ($user as $user) {
                                echo '
                                <tr>
                                <td> <img src="assets/images/users/' . $user["avatar"] . '"    class="avatar avatar-lg rounded-circle me-2" >
                                    <span class="text-heading font-semibold ml-6">' . $user["nom"] . ' ' . $user["prenom"] . '</span></td>
                                    <td>' . $user["telephone"] . '</td>
                                    <td>' . $user["username"] . '</td>
                                    <td> <a href="/edituser?id=' . $user['id'] . '"  class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a  href="delete/' . $user['id'] . '" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <tfoot class="bg-primary" style="background-color:red">
                    <div class="float-right"><?php

                                                if ($pagination_link) {
                                                    $pagination_link->setPath('users');

                                                    echo $pagination_link->links();
                                                }
                                                ?>
                    </div>
                </tfoot>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-center text-light" id="exampleModalLabel">Ajouter un utilisateur </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class='error_msg'>
            </div>
            </div>
        </div>
    </div>
    <script>
        $('.btn').click(function() {
   
           //element to be click to load the page in the div
             $('.modal-body').load('signup');

        });
    </script>
    <?= $this->endSection() ?>
  