<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<?php $validation =  \Config\Services::validation();
helper('form');
$session = \Config\Services::session();
?>
<div class="container p-3">
    <h1 class="text-center">Cocher la ou les bonnes réponses </h1>
    <div class="card">
        <div class="card-header">
            <h1><?= $question[0]['libelle'] ?></h1>
        </div>
        <div class="p-4 shadow">
            <?php foreach ($question[1] as $reponse) {
                $inputType = "checkbox";
                if ($reponse["type_reponse"] == "simple") {
                    $inputType = "radio";
                }
            ?>

                <h3> <input class="form-check-input" type="<?= $inputType ?>" name="reponse" /><span class="ml-5"><?= $reponse['libelle'];
                                                                                                                } ?></span>
                </h3>

        </div>
    </div>

    <div class="float-right"><?php
                                if ($pagination_link) {
                               
                                    echo $pagination_link->only(['prev', 'order'])->links();
                                }
                                ?>
    </div>
    
</div>
<?= $this->endSection() ?>