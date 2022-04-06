<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<?php $validation =  \Config\Services::validation();
helper('form');
$session = \Config\Services::session();
?>
<div class="container">
    <div class="card">
        <div class="card-header">
              <h2>Culture générale</h2>
          
            </div>
        </div>
        <div class="card-body">
          <h1> <?= $questions[0]['libelle'] ?></h1>
        </div>
    </div>
    <div class="float-right"><?php
                                if ($pagination_link) {
                                    $pagination_link->setPath('quizz');

                                    echo $pagination_link->links();
                                }
                                ?>
    </div>
</div>
<?= $this->endSection() ?>