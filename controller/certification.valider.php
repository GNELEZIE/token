<?php
session_start();
if(isset($_SESSION['usermeetmee']) and isset($_POST['id'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Certificate.class.php";
    include_once "../class/Utilisateur.class.php";

    extract($_POST);

    $id = htmlentities(trim(addslashes($id)));
    $etat = 1;
    $update = $certificate->updateCertifie($etat,$id);
    if($update >0){
        $data = $certificate->getCertificateById($id)->fetch();
        $upd = $utilisateur->updateCertif($etat,$data['user_id']);
        echo 'ok';
    }
}