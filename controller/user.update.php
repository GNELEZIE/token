<?php
if(isset($_POST['pseudo']) and  isset($_POST['email']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $slug = create_slug($_POST['pseudo']);

    $dataVerif = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();
    if($dataVerif['type_compte'] == 1){
        $pseudo = htmlentities(trim(addslashes(strip_tags($pseudo))));
        $email = htmlentities(trim(addslashes(strip_tags($email))));
        $origine = htmlentities(trim(addslashes(strip_tags($origine))));
        $age = htmlentities(trim(addslashes(strip_tags($age))));
        $taille = htmlentities(trim(addslashes(strip_tags($taille))));
        $silhouette = htmlentities(trim(addslashes(strip_tags($silhouette))));
        $seins = htmlentities(trim(addslashes(strip_tags($seins))));
        $cheveux = htmlentities(trim(addslashes(strip_tags($cheveux))));
        $yeux = htmlentities(trim(addslashes(strip_tags($yeux))));
        $pubis = htmlentities(trim(addslashes(strip_tags($pubis))));
        $ville = htmlentities(trim(addslashes(strip_tags($ville))));
        $phone = htmlentities(trim(addslashes(strip_tags($phone))));
        $isoPhone = htmlentities(trim(addslashes(strip_tags($isoPhone))));
        $dialPhone = htmlentities(trim(addslashes(strip_tags($dialPhone))));
        $phonew = htmlentities(trim(addslashes(strip_tags($phonew))));
        $isoPhonew = htmlentities(trim(addslashes(strip_tags($isoPhonew))));
        $dialPhonew = htmlentities(trim(addslashes(strip_tags($dialPhonew))));
        $adresse = htmlentities(trim(addslashes(strip_tags($adresse))));
        $shortdes = mb_convert_encoding(strip_tags($shortdes), 'HTML-ENTITIES', 'UTF-8');
        $description = mb_convert_encoding(strip_tags($description), 'HTML-ENTITIES', 'UTF-8');

        $propriety = 'pseudo';
        $verifSlug = $utilisateur->verifUtilisateur($propriety,$pseudo);
        $rsSlug = $verifSlug->fetch();
        $nbSlug =$verifSlug->rowCount();
        if($nbSlug > 0 AND $rsSlug['id_utilisateur'] != $_SESSION['usermeetmee']['id_utilisateur']){
            $slug = $slug.'-'.$nbSlug;
        }

        $emailUser = 'email';
        $verif = $utilisateur->verifUtilisateur($emailUser,$email);
        $rs = $verif->fetch();

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['connect'] = 'Adresse email non correcte';
        }elseif($verif->rowCount() > 0 AND $rs['id_utilisateur'] != $_SESSION['usermeetmee']['id_utilisateur']){
            $errors['connect'] = 'L\'adresse email saisi existe déjà';
        }else{
            $del = $categorie->deleteCategorie($_SESSION['usermeetmee']['id_utilisateur']);
            foreach ($_POST['category'] as $value){
                $save = $categorie->addCategorie($_SESSION['usermeetmee']['id_utilisateur'],$value);
            }
            $update = $utilisateur->updateUtilisateur($email,$pseudo,$slug,$origine,$taille,$silhouette,$age,$cheveux,$yeux,$seins,$pubis,$ville,$phone,$isoPhone,$dialPhone,$phonew,$isoPhonew,$dialPhonew,$adresse,$shortdes,$description,$_SESSION['usermeetmee']['id_utilisateur']);
            if($update >0){
                $data = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();
                unset($_SESSION['usermeetmee']);
                $_SESSION['usermeetmee'] = $data;
                $success['success'] = 'Toutes les modifications ont été effectuées avec succès';
            }
        }
    }elseif($dataVerif['type_compte'] == 2){
        $pseudo = htmlentities(trim(addslashes(strip_tags($pseudo))));
        $email = htmlentities(trim(addslashes(strip_tags($email))));
        $catego = htmlentities(trim(addslashes(strip_tags($catego))));
        $ville = htmlentities(trim(addslashes(strip_tags($ville))));
        $nbFille = htmlentities(trim(addslashes(strip_tags($nbFille))));
        $adresse = htmlentities(trim(addslashes(strip_tags($adresse))));
        $recrutement = htmlentities(trim(addslashes(strip_tags($recrutement))));
        $tarif = htmlentities(trim(addslashes(strip_tags($tarif))));
        $phone = htmlentities(trim(addslashes(strip_tags($phone))));
        $isoPhone = htmlentities(trim(addslashes(strip_tags($isoPhone))));
        $dialPhone = htmlentities(trim(addslashes(strip_tags($dialPhone))));
        $phonew = htmlentities(trim(addslashes(strip_tags($phonew))));
        $isoPhonew = htmlentities(trim(addslashes(strip_tags($isoPhonew))));
        $dialPhonew = htmlentities(trim(addslashes(strip_tags($dialPhonew))));
        $description = htmlentities(trim(addslashes(strip_tags($description))));

        $propriety = 'pseudo';
        $verifSlug = $utilisateur->verifUtilisateur($propriety,$pseudo);
        $rsSlug = $verifSlug->fetch();
        $nbSlug =$verifSlug->rowCount();
        if($nbSlug > 0 AND $rsSlug['id_utilisateur'] != $_SESSION['usermeetmee']['id_utilisateur']){
            $slug = $slug.'-'.$nbSlug;
        }

        $emailUser = 'email';
        $verif = $utilisateur->verifUtilisateur($emailUser,$email);
        $rs = $verif->fetch();

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['connect'] = 'Adresse email non correcte';
        }elseif($verif->rowCount() > 0 AND $rs['id_utilisateur'] != $_SESSION['usermeetmee']['id_utilisateur']){
            $errors['connect'] = 'L\'adresse email saisi existe déjà';
        }else{
            $update = $utilisateur->updateUtilisateurSalon($email,$pseudo,$slug,$catego,$ville,$phone,$isoPhone,$dialPhone,$phonew,$isoPhonew,$dialPhonew,$adresse,$description,$nbFille,$recrutement,$tarif,$_SESSION['usermeetmee']['id_utilisateur']);
            if($update >0){
                $data = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();
                unset($_SESSION['usermeetmee']);
                $_SESSION['usermeetmee'] = $data;
                $success['success'] = 'Toutes les modifications ont été effectuées avec succès';
            }
        }
    }else{
        $pseudo = htmlentities(trim(addslashes(strip_tags($pseudo))));
        $email = htmlentities(trim(addslashes(strip_tags($email))));
        $ville = htmlentities(trim(addslashes(strip_tags($ville))));
        $age = htmlentities(trim(addslashes(strip_tags($age))));

        $propriety = 'pseudo';
        $verifSlug = $utilisateur->verifUtilisateur($propriety,$pseudo);
        $rsSlug = $verifSlug->fetch();
        $nbSlug =$verifSlug->rowCount();
        if($nbSlug > 0 AND $rsSlug['id_utilisateur'] != $_SESSION['usermeetmee']['id_utilisateur']){
            $slug = $slug.'-'.$nbSlug;
        }

        $emailUser = 'email';
        $verif = $utilisateur->verifUtilisateur($emailUser,$email);
        $rs = $verif->fetch();

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['connect'] = 'Adresse email non correcte';
        }elseif($verif->rowCount() > 0 AND $rs['id_utilisateur'] != $_SESSION['usermeetmee']['id_utilisateur']){
            $errors['connect'] = 'L\'adresse email saisi existe déjà';
        }else{
            $update = $utilisateur->updateUtilisateurMenbre($email,$pseudo,$slug,$ville,$age,$_SESSION['usermeetmee']['id_utilisateur']);
            if($update >0){
                $data = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();
                unset($_SESSION['usermeetmee']);
                $_SESSION['usermeetmee'] = $data;
                $success['success'] = 'Toutes les modifications ont été effectuées avec succès';
            }
        }
    }
}
