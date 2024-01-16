<?php
    include_once("../helper.php");

    function create() {
        $nomA = $_POST['nomA'];
        $NbLikes = $_POST['NbLikes'];
        $NomC = $_POST['NomC'];
        $codeTA = $_POST['codeTA'];

        try {
            $db = Helper::connect_db();
            $id = Helper::exec_whith_return_value($db, "select count(idAction) as id from Actions")[0]['id'] + 1;
            $req = "Insert into Actions (idAction, nomA, NbLikes, NomC, codeTA) values ($id, '$nomA', $NbLikes, '$NomC', '$codeTA')";
            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/actions/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }

    function update() {
        $nomA = $_POST['nomA'];
        $NbLikes = $_POST['NbLikes'];
        $NomC = $_POST['NomC'];
        $codeTA = $_POST['codeTA'];
        $idAction = $_POST['idAction'];

        try {
            $db = Helper::connect_db();

            $req = "UPDATE Actions SET  nomA = '$nomA', NbLikes = $NbLikes, NomC = '$NomC', codeTA = '$codeTA' WHERE idAction = $idAction";
            // $req = "Insert into actions (idAction, nomA, NbLikes, NomC, codeTA) values ($id, '$nomA', $NbLikes, '$NomC', '$codeTA')";

            Helper::exec_whithout_return_value($db, $req);
            header("location:/views/actions/index.php");
        } catch (\Throwable $th) {
            echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $th->getMessage();
        }
    }


    if(isset($_POST['create_action'])){
        create();
    } else if(isset($_POST['update_action'])){
        update();
    }


?>