<?php
class Favoris {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate

    public function addFavoris($dateFavoris,$userId,$idPublication){
        $query = "INSERT INTO favoris(date_favoris,user_id ,id_publication)
            VALUES (:dateFavoris, :userId, :idPublication)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateFavoris" => $dateFavoris,
            "userId" => $userId,
            "idPublication" => $idPublication
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    // Read
    public function getFavorisAll(){

        $query = "SELECT * FROM favoris
        ORDER BY id_favoris DESC ";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getFavorisById($id){

        $query = "SELECT * FROM favoris
        WHERE id_favoris = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getFavorisByUser($userId,$idPublication){

        $query = "SELECT * FROM favoris
        WHERE user_id = :userId AND id_publication = :idPublication";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId,
            "idPublication" => $idPublication
        ));

        return $rs;
    }
    public function getFavorisByProfil($userId){

        $query = "SELECT * FROM favoris
        INNER JOIN utilisateur ON id_utilisateur = id_publication
        WHERE user_id = :userId ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        return $rs;
    }

    public function getUtilisateurNbrFavori($userId){
        $query = "SELECT COUNT(*) as nb FROM favoris
        WHERE user_id = :userId ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        return $rs;
    }








    // Update




    // Delete
    public function deleteFavoris($userId,$idPublication){

        $query = "DELETE FROM favoris WHERE user_id = :userId AND id_publication = :idPublication";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId,
            "idPublication" => $idPublication
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

}

// Instance

$favoris = new Favoris();