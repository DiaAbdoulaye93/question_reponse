<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<?php $validation =  \Config\Services::validation();
helper('form');
?>
<div class="container">
    <h1 class="text-center">Parametrage de questions</h1>
    <form action="<?= site_url('/addquestion')
                    ?>" method="post">
        <div class="p-3 m-3 shadow col-md-12 border-2">
            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Libelle de la question</label>
                <textarea class="form-control" name="libelle" id="exampleFormControlTextarea1" rows="3" value="<?php set_value('libelle')
                                                                                            ?>" class="form-control shadow <?php if ($validation->getError('libelle')) : ?>is-invalid<?php endif ?>"></textarea>
            <div class="invalid-feedback text-danger"><?= $validation->getError('libelle') ?></div>
            </div>

            <div class="mb-4 col-md-6">
                <label for="">choisir une catégorie </label>
                <select name="categorie" id="categorie" class="selectpicker form-control shadow" style="height:5ch" data-live-search="true">
                    <?php foreach ($categories as $Onecategory) : ?>
                        <option value=<?php echo $Onecategory['id']  ?> <?= set_select('categorie',  $Onecategory['id']) ?>>
                            <?php echo $Onecategory['libelle'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4 col-md-6">
                <label for="" class="ml-4">Chosir un type de reponse</label>
                <div class="input-group  ml-4">
                    <select name="type_reponse" id="type_reponse" class="selectpicker form-control shadow col-md-11" style="height:5ch" data-live-search="true">
                        <option>type de reponse</option>
                        <option value="simple">reponse simple</option>
                        <option value="multiple">reponse multiple</option>
                    </select>
                    <button class="btn text-white col-md-1" type="button" style="height:5ch;background-color: #4ebfa6;"> <i class="fa-solid fa-plus add-field"></i> </button>
                </div>

            </div>
            <div class="row new">
            </div>
            <div class="col-md-4"></div>
            <hr>
            <div class="row float-right">
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
        var max_fields = 5; //maximum input boxes allowed
        var wrapper = $(".new"); //Fields wrapper
        var add_button = $(".add-field"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-group ml-5 mb-3 col-md-6"><input placeholder="Reponse ' + x + '" type="text" name="reponse' + x + '" class="form-control  col-md-9 shadow">' +
                    '<input placeholder="score" type="text" name="point' + x + '" class="form-control col-md-2 col-2 shadow"><div class="input-group-append col-md-1">' +
                    '<button class="btn btn-danger remove_field" type="button"><i class="fa-solid fa-trash-can"></i></button></div></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })
    });
</script>
<?= $this->endSection() ?>