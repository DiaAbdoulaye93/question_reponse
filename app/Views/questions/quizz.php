<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<?php $validation =  \Config\Services::validation();
helper('form');
$session = \Config\Services::session();
?>
<div class="container p-3">
    <h1 class="text-center">Quizz</h1>
    <div class="card">
        <div class="card-header">
            <h1><?= $question[0]['libelle'] ?></h1>
        </div>
        <?php foreach ($question[1] as $reponse) {
            $inputType = "checkbox";
            if ($reponse["type_reponse"] == "simple") {
                $inputType = "radio";
            }
        ?>
           
                <input class="form-check-input"  type="<?= $inputType ?>" name="reponse"> <h2><?= $reponse['libelle'];
                                                                } ?>
                </h2>
           
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