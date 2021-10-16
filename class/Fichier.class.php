<?php
class Fichier {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate

    public function addFichier($dateFichier,$userId,$typeFichier,$nom){
        $query = "INSERT INTO fichier(date_fichier,utilisateur_id,type_fichier,nom_fichier)
            VALUES (:dateFichier,:userId,:typeFichier,:nom)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateFichier" => $dateFichier,
            "userId" => $userId,
            "typeFichier" => $typeFichier,
            "nom" => $nom
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    // Read
    public function getFichierAll(){

        $query = "SELECT * FROM fichier
        ORDER BY id_fichier DESC ";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getFichierById($id){

        $query = "SELECT * FROM fichier
        WHERE id_fichier = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getFichierByTypeUser($userId,$typ){

        $query = "SELECT * FROM fichier
        WHERE utilisateur_id = :userId AND type_fichier = :typ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId,
            "typ" => $typ
        ));

        return $rs;
    }

    // Delete
    public function deleteFichier($id){

        $query = "DELETE FROM fichier WHERE id_fichier = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }


}

// Instance

$fichier = new Fichier();