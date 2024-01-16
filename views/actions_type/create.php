<?php
    include_once("../../Layout/blanc-haut.php");

    $actions = Helper::exec_whith_return_value($db, "select * from actions");
    $compagnies = Helper::exec_whith_return_value($db, "select distinct NomC from entreprise");
    $type_actions = Helper::exec_whith_return_value($db, "select distinct codeTA from actions");
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">

            <form action="/Controller/ActionController.php" method="post">

                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">List des actions</h4>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="codeTA">codeTA</label>
                            <input id="codeTA" class="form-control" type="text" name="codeTA">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="Categorie">Categorie</label>
                            <input id="Categorie" class="form-control" type="number" name="Categorie">
                        </div>

                        <div class="form-group col-12">
                            <label for="Description">Description</label>
                            <textarea name="Description" class="form-control" id="Description" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <input type="reset" value="Annuler" class="btn btn-danger mr-2">
                        <input type="submit" name="create_action" value="Enregistrer" class="btn btn-success">
                    </div>
                </div>

            </form>

        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php
    include("../../Layout/blanc-bas.php");
?>