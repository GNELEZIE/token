<?php
class Infos {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate

    public function addInfos($userId){
        $query = "INSERT INTO infos(user_id)
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
    public function getInfosAll(){

        $query = "SELECT * FROM infos
        ORDER BY id_infos DESC ";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getInfosById($id){

        $query = "SELECT * FROM infos
        WHERE user_id = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }


    // Update

    public function updateInfos($francais,$anglais,$arabe,$espagnol,$allemand,$italien,$portugais,$russe,$chinois,$chf,$euro,$dollars,$twint,$visa,$mastercard,$express,$maestro,$paypal,$postfinance,$bitcoin,$mobilite,$tarif,$id){
        $query = "UPDATE infos
            SET francais = :francais, anglais = :anglais, arabe = :arabe, espagnol = :espagnol, allemand = :allemand, italien = :italien, portugais = :portugais, russe = :russe, chinois = :chinois, chf = :chf, euro = :euro, dollars = :dollars, twint = :twint, visa = :visa, mastercard = :mastercard, express = :express, maestro = :maestro, paypal = :paypal, postfinance = :postfinance, bitcoin = :bitcoin, mobilite = :mobilite, tarif = :tarif
            WHERE user_id = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "francais" => $francais,
            "anglais" => $anglais,
            "arabe" => $arabe,
            "espagnol" => $espagnol,
            "allemand" => $allemand,
            "italien" => $italien,
            "portugais" => $portugais,
            "russe" => $russe,
            "chinois" => $chinois,
            "chf" => $chf,
            "euro" => $euro,
            "dollars" => $dollars,
            "twint" => $twint,
            "visa" => $visa,
            "mastercard" => $mastercard,
            "express" => $express,
            "maestro" => $maestro,
            "paypal" => $paypal,
            "postfinance" => $postfinance,
            "bitcoin" => $bitcoin,
            "mobilite" => $mobilite,
            "tarif" => $tarif,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    public function updateInfosHoraire($francais,$anglais,$arabe,$espagnol,$allemand,$italien,$portugais,$russe,$chinois,$chf,$euro,$dollars,$twint,$visa,$mastercard,$express,$maestro,$paypal,$postfinance,$bitcoin,$olundi,$flundi,$omardi,$fmardi,$omercredi,$fmercredi,$ojeudi,$fjeudi,$ovendredi,$fvendredi,$osamedi,$fsamedi,$odimanche,$fdimanche,$id){
        $query = "UPDATE infos
            SET francais = :francais, anglais = :anglais, arabe = :arabe, espagnol = :espagnol, allemand = :allemand, italien = :italien, portugais = :portugais, russe = :russe, chinois = :chinois, chf = :chf, euro = :euro, dollars = :dollars, twint = :twint, visa = :visa, mastercard = :mastercard, express = :express, maestro = :maestro, paypal = :paypal, postfinance = :postfinance, bitcoin = :bitcoin, olundi = :olundi, flundi = :flundi, omardi = :omardi, fmardi = :fmardi, omercredi = :omercredi, fmercredi = :fmercredi, ojeudi = :ojeudi, fjeudi = :fjeudi, ovendredi = :ovendredi, fvendredi = :fvendredi, osamedi = :osamedi, fsamedi = :fsamedi, odimanche = :odimanche, fdimanche = :fdimanche
            WHERE user_id = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "francais" => $francais,
            "anglais" => $anglais,
            "arabe" => $arabe,
            "espagnol" => $espagnol,
            "allemand" => $allemand,
            "italien" => $italien,
            "portugais" => $portugais,
            "russe" => $russe,
            "chinois" => $chinois,
            "chf" => $chf,
            "euro" => $euro,
            "dollars" => $dollars,
            "twint" => $twint,
            "visa" => $visa,
            "mastercard" => $mastercard,
            "express" => $express,
            "maestro" => $maestro,
            "paypal" => $paypal,
            "postfinance" => $postfinance,
            "bitcoin" => $bitcoin,
            "olundi" => $olundi,
            "flundi" => $flundi,
            "omardi" => $omardi,
            "fmardi" => $fmardi,
            "omercredi" => $omercredi,
            "fmercredi" => $fmercredi,
            "ojeudi" => $ojeudi,
            "fjeudi" => $fjeudi,
            "ovendredi" => $ovendredi,
            "fvendredi" => $fvendredi,
            "osamedi" => $osamedi,
            "fsamedi" => $fsamedi,
            "odimanche" => $odimanche,
            "fdimanche" => $fdimanche,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

}

// Instance

$infos = new Infos();