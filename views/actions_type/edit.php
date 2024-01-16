<?php
    include_once("../../Layout/blanc-haut.php");

    $action_type = Helper::exec_whith_return_value($db, "select * from TypeAction where codeTA = '{$_GET['codeTA']}'" )[0];
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">

            <form action="/Controller/ActionTypeController.php" method="post">

                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Edition de type d'action</h4>

                    <input type="hidden" name="codeTA" value="<?php echo $action_type['codeTA']; ?>">

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="codeTA">codeTA</label>
                            <input id="codeTA" class="form-control" type="text" name="codeTA" value="<?php echo $action_type['codeTA']; ?>" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="Categorie">Categorie</label>
                            <input id="Categorie" class="form-control" type="text" name="Categorie" value="<?php echo $action_type['Categorie']; ?>">
                        </div>

                        <div class="form-group col-12">
                            <label for="Description">Description</label>
                            <textarea name="Description" class="form-control" id="Description" rows="4"> <?php echo $action_type['Description']; ?> </textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <input type="reset" value="Annuler" class="btn btn-danger mr-2">
                    <input type="submit" name="update" value="Enregistrer" class="btn btn-success">
                </div>

            </form>

        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php
    include("../../Layout/blanc-bas.php");
?>