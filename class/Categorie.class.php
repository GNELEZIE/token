<?php
class Categorie {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate
    public function addCategorie($idUsers ,$catValue){
        $query = "INSERT INTO categorie(id_users,cat_value)
            VALUES (:idUsers,:catValue)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "idUsers" => $idUsers,
            "catValue" => $catValue
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    // Read

    public function getCategorieById($id){

        $query = "SELECT * FROM categorie
        WHERE id_users = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    // Delete
    public function deleteCategorie($id){

        $query = "DELETE FROM categorie WHERE id_users = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    // AUTRES METHODES


    // Verification valeur existant
    public function verifCategorie($propriete,$val){

        $query = "SELECT * FROM categorie WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));
        return $rs;
    }


}

// Instance

$categorie = new Categorie();