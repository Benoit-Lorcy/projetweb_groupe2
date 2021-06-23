<?php

require_once("constants.php");

class dbConnector {
    private $db;

    public function __construct() {
        // Connection à la base de données
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",
                DB_USERNAME, DB_PASSWORD);
    }

    public function __destruct() {
        // Deconnection de la base de données
        unset($db);
    }

    // Récupère les sites isen
    public function getSiteIsen() {
        $request = "SELECT nom_du_site FROM site_Isen;";
        $statement = $this->db->prepare($request);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Ajoute un utilisateur
    public function getTrajet($debute_isen,$ville,$site_isen,$date_depart) {
        //var_dump(array($debute_isen,$ville,$site_isen,$date_depart));
        try {
            $request = "SELECT * FROM trajet t 
            JOIN ville v ON v.code_insee = t.code_insee
            WHERE t.debute_isen = :debute_isen
            AND v.nom_ville = :ville
            AND t.nom_du_site = :site_isen
            AND CAST(t.date_depart AS DATE) >= :date_depart;
            AND t.nombre_place_restante > 0";

            $debute_isen = ($debute_isen == "true") ? 1 : 0;
            $statement = $this->db->prepare($request);
            $statement->bindParam(":debute_isen", $debute_isen, PDO::PARAM_INT);
            $statement->bindParam(":ville", $ville, PDO::PARAM_STR, 30);
            $statement->bindParam(":site_isen", $site_isen, PDO::PARAM_STR, 30);
            $statement->bindParam(":date_depart", $date_depart, PDO::PARAM_STR, 30);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($result)
            if (empty($result)) 
            $result = "null";
            return $result;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function getTrajetByID($id) {
        //var_dump(array($debute_isen,$ville,$site_isen,$date_depart));
        try {
            $request = "SELECT * FROM trajet t 
            JOIN ville v ON v.code_insee = t.code_insee
            WHERE t.id_trajet = :id";

            $statement = $this->db->prepare($request);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) 
            $result = "null";
            return $result;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function addPassanger($trip_id, $passenger) {
        //var_dump(array($trip_id, $passenger));
        try {
            $request = "UPDATE trajet
            SET nombre_place_restante = nombre_place_restante - 1
            WHERE id_trajet = :trip_id;";
            
            $statement = $this->db->prepare($request);
            $statement->bindParam(":trip_id", $trip_id, PDO::PARAM_INT);
            //$statement->bindParam(":passenger", $passenger, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $e) {
            error_log("Request error: " . $e->getMessage());
            return false;
        }
        return true;
    }

    /*public function addTrajet($debut_isen, $ville, $site_isen, $date_depart, $date_arrivee, $prix, $place){

        try {
            $request = "INSERT INTO trajet(nombre_place, nombre_place_restante, prix, adresse, date_depart,
            date_arrivee, debute_isen, code_insee, nom_du_site, pseudonyme) 
            VALUES (:place,:place,:prix,'',:date_depart, :date_arrivee, :debut_isen, 
            (SELECT code_insee FROM ville WHERE nom_ville = :ville) , :site_isen, 'x');"

            $statement = $this->db->prepare($request);

            $statement->bindParam(":place", $place, PDO::PARAM_INT);
            $statement->bindParam(":prix", $prix, PDO::PARAM_INT);
            $statement->bindParam(":date_depart", $date_depart, PDO::DATE);
            $statement->bindParam(":date_arrivee", $date_arrivee, PDO::DATE);
            $statement->bindParam(":debut_isen", $debut_isen, PDO::PARAM_STR, 100);
            $statement->bindParam(":site_isen", $site_isen, PDO::PARAM_STR, 100);
            $statement->execute();
        }catch (PDOException $e) {
            error_log("Request error: " . $e->getMessage());
            return false;
        }
        return true;
    }*/
}

?>
