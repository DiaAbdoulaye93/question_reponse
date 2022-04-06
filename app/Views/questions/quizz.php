<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<?php $validation =  \Config\Services::validation();
helper('form');
$session = \Config\Services::session();
?>
<div class="container">
    <h2>Culture générale</h2>
</div>
<?= $this->endSection() ?>