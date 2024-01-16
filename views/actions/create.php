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
                            <label for="nomA">Nom Action</label>
                            <input id="nomA" class="form-control" type="text" name="nomA">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="NbLikes">Nombre Like</label>
                            <input id="NbLikes" class="form-control" type="number" name="NbLikes">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="NomC">Compagnie</label>
                            <select name="NomC" id="NomC" class="form-control">
                                <?php
                                    foreach ($compagnies as $compagnie) {
                                        echo '<option value="' . $compagnie["NomC"] . '"> ' . $compagnie["NomC"] . ' </option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="NomC">Type Action</label>
                            <select name="codeTA" id="codeTA" class="form-control">
                                <?php
                                    foreach ($type_actions as $type_action) {
                                        echo '<option value="' . $type_action["codeTA"] . '"> ' . $type_action["codeTA"] . ' </option>';
                                    }
                                ?>
                            </select>
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