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
                <table class="table table-striped table-bordered" id="userliste">
                    <thead>
                        <tr>

                            <th>Nom</th>
                            <th>Prenom</th>
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
                                 
                                    <td>' . $user["nom"] . '</td>
                                    <td>' . $user["prenom"] . '</td>
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
                                                    $pagination_link->setPath('liste');

                                                    echo $pagination_link->links();
                                                }
                                                ?>
                    </div>
                </tfoot>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
