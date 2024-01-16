<?php
    include_once("../../Layout/blanc-haut.php");

    $pg = Helper::exec_whith_return_value($db, "select * from ProgrammeFinancement where CodePg = '{$_GET['CodePg']}'" )[0];
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">

            <form action="/Controller/ProgrammeFinancementController.php" method="post">

                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Edition de programme de financement</h4>

                    <input type="hidden" name="CodePg" value="<?php echo $pg['CodePg']; ?>">

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="CodePg">CodePg</label>
                            <input id="CodePg" class="form-control" type="text" name="CodePg" value="<?php echo $pg['CodePg']; ?>" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="NomP">NomP</label>
                            <input id="NomP" class="form-control" type="text" name="NomP" value="<?php echo $pg['NomP']; ?>">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="Laprocedure">Laprocedure</label>
                            <input id="Laprocedure" class="form-control" type="text" name="Laprocedure" value="<?php echo $pg['Laprocedure']; ?>">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="MontantMax">MontantMax</label>
                            <input id="MontantMax" class="form-control" type="number" name="MontantMax" value="<?php echo $pg['MontantMax']; ?>">
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