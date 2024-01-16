<?php

    class Helper {
        static function connect_db(){
            $host = "localhost";
            $db_name = 'cours_bdd_exo3_soutenance';
            $db_username = 'root';
            $db_pass = '';

            try {
                $db = new PDO("mysql:host=$host;dbname=$db_name", $db_username, $db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $db;
            } catch (PDOException $e) {
                echo "Une erreur est survenue lors de la connexion a la base de données : " . $e->getMessage();
            }

        }


        static function disconnect_db($db) {
            $db = null;
        }


        static function exec_whith_return_value($db, $requet){

            try {
                $requet = $db->prepare($requet);
                $requet->execute();
                $resutl = $requet->fetchAll();
            } catch (PDOException $e) {
                echo "Une erreur est survenue lors de l'exécussion de votre requete => ". $e->getMessage();
            }

            return $resutl;
        }

        static function exec_whithout_return_value($db, $requet){

            try {
                $requet = $db->prepare($requet);
                print_r($requet->execute());
            } catch (PDOException $e) {
                throw $e;
            }

        }
    }

?>