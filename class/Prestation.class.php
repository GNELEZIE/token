<?php
class Prestation {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate

    public function addPrestation($userId){
        $query = "INSERT INTO prestation(utilisateur_id)
            VALUES (:userId)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userId" => $userId
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    // Read
    public function getPrestationAll(){

        $query = "SELECT * FROM prestation
        ORDER BY id_prestation  DESC ";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getPrestationById($id){

        $query = "SELECT * FROM prestation
        WHERE utilisateur_id = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }


    // Update
    public function updatePrestation($check69,$anulingus,$branlette,$pipe,$couple,$cunnilingus,$domination,$penetration,$duo,$ejacuCorps,$ejacuFacial,$facesitting,$fellation,$fetichisme,$french,$gfe,$gorge,$jeux,$lingerie,$massage,$masturbation,$pornStar,$rapport,$serviceVip,$sexeGroupe,$sexToys,$sodomie,$striptease,$id){
        $query = "UPDATE prestation
            SET check69 = :check69, anulingus = :anulingus, branlette = :branlette, pipe = :pipe, couple = :couple, cunnilingus = :cunnilingus, domination = :domination, penetration = :penetration, duo = :duo, ejacu_corps = :ejacuCorps, ejacu_facial = :ejacuFacial, facesitting = :facesitting, fellation = :fellation, fetichisme = :fetichisme, french = :french, gfe = :gfe, gorge = :gorge, jeux = :jeux, lingerie = :lingerie, massage = :massage, masturbation = :masturbation, porn_star = :pornStar, rapport = :rapport, service_vip = :serviceVip, sexe_groupe = :sexeGroupe, sex_toys = :sexToys, sodomie = :sodomie, striptease = :striptease
            WHERE utilisateur_id = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "check69" => $check69,
            "anulingus" => $anulingus,
            "branlette" => $branlette,
            "pipe" => $pipe,
            "couple" => $couple,
            "cunnilingus" => $cunnilingus,
            "domination" => $domination,
            "penetration" => $penetration,
            "duo" => $duo,
            "ejacuCorps" => $ejacuCorps,
            "ejacuFacial" => $ejacuFacial,
            "facesitting" => $facesitting,
            "fellation" => $fellation,
            "fetichisme" => $fetichisme,
            "french" => $french,
            "gfe" => $gfe,
            "gorge" => $gorge,
            "jeux" => $jeux,
            "lingerie" => $lingerie,
            "massage" => $massage,
            "masturbation" => $masturbation,
            "pornStar" => $pornStar,
            "rapport" => $rapport,
            "serviceVip" => $serviceVip,
            "sexeGroupe" => $sexeGroupe,
            "sexToys" => $sexToys,
            "sodomie" => $sodomie,
            "striptease" => $striptease,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

}

// Instance

$prestation = new Prestation();