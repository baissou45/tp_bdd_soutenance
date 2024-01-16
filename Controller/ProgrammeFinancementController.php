<?php
    include_once("../helper.php");

    function create() {
        $CodePg = $_POST['CodePg'];
        $NomP = $_POST['NomP'];
        $Laprocedure = $_POST['Laprocedure'];
        $MontantMax = $_POST['MontantMax'];

        try {
            $db = Helper::connect_db();
            $req = "Insert into ProgrammeFinancement (CodePg, NomP, Laprocedure, MontantMax) values ('$CodePg', '$NomP', '$Laprocedure', $MontantMax)";
            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/programme_financement/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }

    function update() {
        $CodePg = $_POST['CodePg'];
        $NomP = $_POST['NomP'];
        $Laprocedure = $_POST['Laprocedure'];
        $MontantMax = $_POST['MontantMax'];

        try {
            $db = Helper::connect_db();

            $req = "UPDATE ProgrammeFinancement SET NomP = '$NomP', Laprocedure = '$Laprocedure', MontantMax = '$MontantMax' WHERE CodePg = '$CodePg'";
            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/programme_financement/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }


    if(isset($_POST['create'])){
        create();
    } else if(isset($_POST['update'])){
        update();
    }

