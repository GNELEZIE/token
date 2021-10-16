<?php
class Utilisateur {

    public function __construct(){
        $this->bdd = bdd();
    }

    //Cerate
    public function addUtilisateur($userDate,$email,$typeCpte,$mot_de_passe){
        $query = "INSERT INTO utilisateur(date_utilisateur,email,type_compte,mot_de_passe)
            VALUES (:userDate,:email,:typeCpte,:mot_de_passe)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "userDate" => $userDate,
            "email" => $email,
            "typeCpte" => $typeCpte,
            "mot_de_passe" => $mot_de_passe
        ));

        $nb = $rs->rowCount();

        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    // Read
    public function getUtilisateurAll(){

        $query = "SELECT * FROM utilisateur
        ORDER BY id_utilisateur DESC ";
        $rs = $this->bdd->query($query);

        return $rs;
    }
    public function getUtilisateurAllAdmin(){

        $query = "SELECT * FROM utilisateur
        WHERE admin != 1 AND pseudo != '' AND photo != '' ORDER BY id_utilisateur DESC";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getUtilisateurNbrAdmin(){

        $query = "SELECT COUNT(*) as nb FROM utilisateur
        WHERE admin != 1 AND pseudo != '' AND photo != ''";
        $rs = $this->bdd->query($query);

        return $rs;
    }


    public function getUtilisateurSalonByVilleCat($typCpte,$ville,$catValue,$debut,$fin){
        $query = "SELECT * FROM utilisateur
        WHERE type_compte = :typCpte AND ville = :ville AND cat_salon = :catValue AND bloquer = 0 AND pseudo != '' AND photo != '' ORDER BY id_utilisateur DESC LIMIT $debut,$fin";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "typCpte" => $typCpte,
            "ville" => $ville,
            "catValue" => $catValue
        ));

        return $rs;
    }

    public function getUtilisateurSalonByCat($typCpte,$catValue,$debut,$fin){
        $query = "SELECT * FROM utilisateur
        WHERE type_compte = :typCpte AND cat_salon = :catValue AND bloquer = 0 AND pseudo != '' AND photo != '' ORDER BY id_utilisateur DESC LIMIT $debut,$fin";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "typCpte" => $typCpte,
            "catValue" => $catValue
        ));

        return $rs;
    }


    public function getUtilisateurNbrFilles(){

        $query = "SELECT COUNT(*) as nb FROM utilisateur
        WHERE type_compte != 3 AND bloquer = 0 AND pseudo != '' AND photo != ''";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getUtilisateurHome(){

        $query = "SELECT * FROM utilisateur
        WHERE type_compte != 3 AND bloquer = 0 AND pseudo != '' AND photo != '' ORDER BY id_utilisateur DESC LIMIT 20";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getUtilisateurHasard(){

        $query = "SELECT * FROM utilisateur
        WHERE type_compte != 3 AND bloquer = 0 AND pseudo != '' AND photo != '' ORDER BY RAND() LIMIT 10";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    public function getUtilisateurById($id){

        $query = "SELECT * FROM utilisateur
        WHERE id_utilisateur = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getUtilisateurBySearch($search,$searchVille){

        $query = "SELECT * FROM utilisateur
        WHERE pseudo LIKE '%$search%' OR ville = :searchVille";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "searchVille" => $searchVille
        ));

        return $rs;
    }

    public function getUtilisateurBySearchNbr($search,$searchVille){

        $query = "SELECT COUNT(*) as nb FROM utilisateur
        WHERE pseudo LIKE '%$search%'  OR ville = :searchVille";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "searchVille" => $searchVille
        ));

        return $rs;
    }

    public function getUtilisateurByEmail($email){

        $query = "SELECT * FROM utilisateur
        WHERE email = :email";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "email" => $email
        ));

        return $rs;
    }




    // Update
    public function updateUtilisateur($email,$pseudo,$slug,$origine,$taille,$silhouette,$age,$cheveux,$yeux,$seins,$pubis,$ville,$phone,$isoPhone,$dialPhone,$phonew,$isoPhonew,$dialPhonew,$adresse,$shortdes,$description,$id){
        $query = "UPDATE utilisateur
            SET email = :email, pseudo = :pseudo, slug = :slug, origine = :origine, taille = :taille, silhouette = :silhouette, age = :age, cheveux = :cheveux, yeux = :yeux, seins = :seins, pubis = :pubis, ville = :ville, phone = :phone, iso_phone = :isoPhone, dial_phone = :dialPhone, phonew = :phonew, iso_phonew = :isoPhonew, dial_phonew = :dialPhonew, adresse = :adresse, shortdes = :shortdes, description = :description
            WHERE id_utilisateur = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "email" => $email,
            "pseudo" => $pseudo,
            "slug" => $slug,
            "origine" => $origine,
            "taille" => $taille,
            "silhouette" => $silhouette,
            "age" => $age,
            "cheveux" => $cheveux,
            "yeux" => $yeux,
            "seins" => $seins,
            "pubis" => $pubis,
            "ville" => $ville,
            "phone" => $phone,
            "isoPhone" => $isoPhone,
            "dialPhone" => $dialPhone,
            "phonew" => $phonew,
            "isoPhonew" => $isoPhonew,
            "dialPhonew" => $dialPhonew,
            "adresse" => $adresse,
            "shortdes" => $shortdes,
            "description" => $description,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;
    }


    public function updateUtilisateurSalon($email,$pseudo,$slug,$catego,$ville,$phone,$isoPhone,$dialPhone,$phonew,$isoPhonew,$dialPhonew,$adresse,$description,$nbFille,$recrutement,$tarif,$id){
        $query = "UPDATE utilisateur
            SET email = :email, pseudo = :pseudo, slug = :slug, cat_salon = :catego, ville = :ville, phone = :phone, iso_phone = :isoPhone, dial_phone = :dialPhone, phonew = :phonew, iso_phonew = :isoPhonew, dial_phonew = :dialPhonew, adresse = :adresse, description = :description, nb_fille = :nbFille, recrutement = :recrutement, tarif_salon = :tarif
            WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "email" => $email,
            "pseudo" => $pseudo,
            "slug" => $slug,
            "catego" => $catego,
            "ville" => $ville,
            "phone" => $phone,
            "isoPhone" => $isoPhone,
            "dialPhone" => $dialPhone,
            "phonew" => $phonew,
            "isoPhonew" => $isoPhonew,
            "dialPhonew" => $dialPhonew,
            "adresse" => $adresse,
            "description" => $description,
            "nbFille" => $nbFille,
            "recrutement" => $recrutement,
            "tarif" => $tarif,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    public function updateUtilisateurMenbre($email,$pseudo,$slug,$ville,$age,$id){
        $query = "UPDATE utilisateur
            SET email = :email, pseudo = :pseudo, slug = :slug, ville = :ville, age = :age
            WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "email" => $email,
            "pseudo" => $pseudo,
            "slug" => $slug,
            "ville" => $ville,
            "age" => $age,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    // Update MP
    public function updatePassword($password,$id){
        $query = "UPDATE utilisateur
            SET mot_de_passe = :password WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "password" => $password,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    public function updateUtilisateurPhoto($photo,$id){
        $query = "UPDATE utilisateur
            SET photo = :photo
            WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "photo" => $photo,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    public function updateUtilisateurVideo($video,$id){
        $query = "UPDATE utilisateur
            SET video = :video
            WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "video" => $video,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }


    // AUTRES METHODES


    // Verification valeur existant
    public function verifUtilisateur($propriete,$val){

        $query = "SELECT * FROM utilisateur WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }

    public function updateBloquer($etat,$id){
        $query = "UPDATE utilisateur
            SET bloquer = :etat
            WHERE id_utilisateur = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "etat" => $etat,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }

    public function updateCertif($etat,$id){
        $query = "UPDATE utilisateur
            SET certificate = :etat
            WHERE id_utilisateur = :id ";
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

$utilisateur = new Utilisateur();