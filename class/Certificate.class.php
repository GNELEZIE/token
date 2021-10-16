<?php
class Certificate {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate

    public function addCertificate($dateCertificate,$userId,$doc){
        $query = "INSERT INTO certificate(date_certificate,user_id ,doc)
            VALUES (:dateCertificate,:userId,:doc)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateCertificate" => $dateCertificate,
            "userId" => $userId,
            "doc" => $doc
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    public function getCertificateAll(){
        $query = "SELECT * FROM certificate
        INNER JOIN utilisateur ON id_utilisateur = user_id
        WHERE etat  = 0 ORDER BY id_certificate DESC";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getCertificateNbr(){
        $query = "SELECT COUNT(*) as nb FROM certificate
        WHERE etat  = 0";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getCertificateById($id){

        $query = "SELECT * FROM certificate
        WHERE id_certificate = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getCertificateByIduser($id){

        $query = "SELECT * FROM certificate
        WHERE user_id = :id ORDER BY id_certificate DESC";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function updateCertifie($etat,$id){
        $query = "UPDATE certificate
            SET etat = :etat
            WHERE id_certificate = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "etat" => $etat,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }





}

// Instance

$certificate = new Certificate();