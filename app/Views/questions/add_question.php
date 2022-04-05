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
                    <label for="">Chosir un type de reponse</label>
                    <select name="user_type" id="user_type" class="selectpicker form-control shadow" style="height:5ch" data-live-search="true">
                        <option>type de reponse</option>
                        <option value="simple">reponse simple</option>
                        <option value="multiple">reponse multiple</option>
                    </select>
                </div>
            </div><hr>
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
<?= $this->endSection() ?>