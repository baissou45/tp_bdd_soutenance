<?php
    include_once("../helper.php");

    function create() {
        $codeTA = $_POST['codeTA'];
        $Categorie = $_POST['Categorie'];
        $Description = $_POST['Description'];

        try {
            $db = Helper::connect_db();
            $req = "Insert into TypeAction (codeTA, Categorie, Description) values ('$codeTA', '$Categorie', '$Description')";
            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/actions_type/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }

    function update() {
        $codeTA = $_POST['codeTA'];
        $Categorie = $_POST['Categorie'];
        $Description = $_POST['Description'];

        try {
            $db = Helper::connect_db();

            $req = "UPDATE TypeAction SET Categorie = '$Categorie', Description = '$Description' WHERE  codeTA = '$codeTA'";
            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/actions_type/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }


    if(isset($_POST['create'])){
        create();
    } else if(isset($_POST['update'])){
        update();
    }

