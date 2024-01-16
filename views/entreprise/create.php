<?php
    include_once("../../Layout/blanc-haut.php");
?>

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">

            <form action="/Controller/EntrepriseController.php" method="post">

                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Création d'entreprise'</h4>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="NomC">Nom</label>
                            <input id="NomC" class="form-control" type="text" name="NomC">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="Secteur">Secteur</label>
                            <input id="Secteur" class="form-control" type="text" name="Secteur">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="Ville">Ville</label>
                            <input id="Ville" class="form-control" type="text" name="Ville">
                        </div>

                        <div class="form-group col-12 col-md-3">
                            <label for="SiteWeb">SiteWeb</label>
                            <input id="SiteWeb" class="form-control" type="text" name="SiteWeb">
                        </div>

                        <div class="form-group col-12 col-md-3">
                            <label for="Taille_">Taille_</label>
                            <input id="Taille_" class="form-control" type="text" name="Taille_">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <input type="reset" value="Annuler" class="btn btn-danger mr-2">
                    <input type="submit" name="create" value="Enregistrer" class="btn btn-success">
                </div>

            </form>

        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php
    include("../../Layout/blanc-bas.php");
?>