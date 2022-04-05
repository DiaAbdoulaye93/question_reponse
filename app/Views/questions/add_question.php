<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<div class="container">
    <h1 class="text-center">Parametrage de questions</h1>
    <form action="" method="post">
        <div class="p-3 m-3 shadow col-md-12 border-2">
            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Libelle de la question</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="row">
                <div class="form-group mb-4 col-md-4">
                    <label for="">choisir une catégorie </label>
                    <select name="user_type" id="user_type" class="selectpicker form-control shadow" style="height:5ch" data-live-search="true">
                        <option>catégorie de question</option>
                        <option value="simple">reponse simple</option>
                        <option value="multiple">reponse multiple</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-4 col-md-4">
                    <label for="">Chosir un type de reponse</label>
                    <select name="user_type" id="user_type" class="selectpicker form-control shadow" style="height:5ch" data-live-search="true">
                        <option>type de reponse</option>
                        <option value="simple">reponse simple</option>
                        <option value="multiple">reponse multiple</option>
                    </select>
                </div>
                <div class="form-group">
                    <i class="fa-solid fa-plus text-success add-field" onclick="generateInput()"></i>
                </div>
            </div>
            <div class="row new">
            </div>
            <div class="col-md-4"></div>
            <hr>
            <div class="row ">
                <div class="form-group  col-md-2">
                    <button type="reset" class="btn btn-danger form-control">Reinitialiser</button>
                </div>
                <div class="form-group col-md-2">

                    <button type="submit" class="btn form-control submit" style="background-color: #4ebfa6;">Soummetre</button>
                </div>
            </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".new"); //Fields wrapper
        var add_button = $(".add-field"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-group mb-3"><input placeholder="Reponse ' + x + '" type="text" name="reponse' + x + '" class="form-control">' +
                    '<input placeholder="Enter Price" type="text" name="note' + x + '" class="form-control"><div class="input-group-append">' +
                    '<button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>'); //add input box
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