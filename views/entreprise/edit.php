<?php
    include_once("../../Layout/blanc-haut.php");

    $entreprise = Helper::exec_whith_return_value($db, "select * from Entreprise where NomC = '{$_GET['NomC']}'" )[0];
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">

            <form action="/Controller/EntrepriseController.php" method="post">

                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Création de type d'action</h4>

                    <input type="hidden" name="NomC" value="<?php echo $entreprise['NomC']; ?>">

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="NomC">Nom</label>
                            <input id="NomC" class="form-control" type="text" name="NomC"  value="<?php echo $entreprise['NomC']; ?>" disabled>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="Secteur">Secteur</label>
                            <input id="Secteur" class="form-control" type="text" name="Secteur" value="<?php echo $entreprise['Secteur']; ?>">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="Ville">Ville</label>
                            <input id="Ville" class="form-control" type="text" name="Ville" value="<?php echo $entreprise['Ville']; ?>">
                        </div>

                        <div class="form-group col-12 col-md-3">
                            <label for="SiteWeb">SiteWeb</label>
                            <input id="SiteWeb" class="form-control" type="text" name="SiteWeb" value="<?php echo $entreprise['SiteWeb']; ?>">
                        </div>

                        <div class="form-group col-12 col-md-3">
                            <label for="Taille_">Taille_</label>
                            <input id="Taille_" class="form-control" type="text" name="Taille_" value="<?php echo $entreprise['Taille_']; ?>">
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