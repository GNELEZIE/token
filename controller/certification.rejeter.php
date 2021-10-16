<?php
session_start();
if(isset($_SESSION['usermeetmee']) and isset($_POST['id'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Certificate.class.php";

    extract($_POST);

    $id = htmlentities(trim(addslashes($id)));
    $etat = 2;
    $etatUser = 0;
    $update = $certificate->updateCertifie($etat,$id);
    if($update >0){
        $data = $certificate->getCertificateById($id)->fetch();
        $fichier ='../media/identification/'.$data['doc'];
        if(file_exists($fichier)){
            unlink($fichier);
        }
        echo 'ok';
    }
}