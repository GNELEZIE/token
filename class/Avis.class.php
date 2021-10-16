<?php
class Avis {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate

    public function addAvis($dateAvis,$userId,$idPub,$contenu){
        $query = "INSERT INTO avis(date_avis,user_id,pub_id,contenu)
            VALUES (:dateAvis, :userId, :idPub, :contenu)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateAvis" => $dateAvis,
            "userId" => $userId,
            "idPub" => $idPub,
            "contenu" => $contenu
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    // Read

    public function getAvisByProfil($userId){
        $query = "SELECT * FROM avis
        INNER JOIN utilisateur ON id_utilisateur = pub_id
        WHERE pub_id = :userId ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));
        return $rs;
    }


// Afficher les avis des user par page
    public function getAvisAll($debut,$fin){
        $query = "SELECT * FROM avis
        INNER JOIN utilisateur ON id_utilisateur = pub_id
        ORDER BY id_avis DESC LIMIT $debut,$fin";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getAvisByUser($userId,$debut,$fin){
        $query = "SELECT * FROM avis
        INNER JOIN utilisateur ON id_utilisateur = pub_id
        WHERE user_id = :userId ORDER BY id_avis DESC LIMIT $debut,$fin";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));
        return $rs;
    }



// Afficher les avis au hasard sur home
    public function getAvisHasard(){
        $query = "SELECT * FROM avis
        INNER JOIN utilisateur ON id_utilisateur = pub_id
        ORDER BY RAND() LIMIT 10";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    // Afficher le nombre d'avis par user
    public function getNbAvisByUserId($userId){
        $query = "SELECT COUNT(*) as nb  FROM avis
         WHERE user_id = :userId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));
        return $rs;
    }

    public function getNbAvisByPubId($pubId){
        $query = "SELECT COUNT(*) as nb FROM avis
         WHERE pub_id  = :pubId";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "pubId" => $pubId
        ));
        return $rs;
    }


    //Afficher nombre d'avis sur home
    public function getUtilisateurNbrAvis(){
        $query = "SELECT COUNT(*) as nbr FROM avis";
        $rs = $this->bdd->query($query);
        return $rs;
    }



    public function getAvisByVille($ville,$debut,$fin){
        $query = "SELECT * FROM avis
        INNER JOIN utilisateur ON id_utilisateur = pub_id
        WHERE ville = :ville ORDER BY id_avis DESC LIMIT $debut,$fin ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "ville" => $ville
        ));
        return $rs;
    }




    // Update

    // Delete
    public function deleteAvis($userId,$idPublication){

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

$avis = new Avis();