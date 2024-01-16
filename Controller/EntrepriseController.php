<?php
    include_once("../helper.php");

    function create() {
        $NomC = $_POST['NomC'];
        $Secteur = $_POST['Secteur'];
        $Ville = $_POST['Ville'];
        $SiteWeb = $_POST['SiteWeb'];
        $Taille_ = $_POST['Taille_'];

        try {
            $db = Helper::connect_db();
            $req = "Insert into entreprise (NomC, Secteur, Ville, SiteWeb, Taille_) values ('$NomC','$Secteur','$Ville','$SiteWeb','$Taille_')";
            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/entreprise/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }

    function update() {
        $NomC = $_POST['NomC'];
        $Secteur = $_POST['Secteur'];
        $Ville = $_POST['Ville'];
        $SiteWeb = $_POST['SiteWeb'];
        $Taille_ = $_POST['Taille_'];

        try {
            $db = Helper::connect_db();

            $req = "UPDATE entreprise SET Secteur = '$Secteur', Ville = '$Ville', SiteWeb = '$SiteWeb', Taille_ = '$Taille_' WHERE NomC = '$NomC'";
            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/entreprise/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }


    if(isset($_POST['create'])){
        create();
    } else if(isset($_POST['update'])){
        update();
    }

