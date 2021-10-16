<?php
session_start();
if(isset($_SESSION['usermeetmee']) and isset($_POST['idPub'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/avis.class.php";

    extract($_POST);

    $idPub = htmlentities(trim(addslashes($idPub)));
    $avisText = mb_convert_encoding(strip_tags($avisText), 'HTML-ENTITIES', 'UTF-8');
    $date = date('Y-m-d H:i');
    $save = $avis->addAvis($date,$_SESSION['usermeetmee']['id_utilisateur'],$idPub,$avisText);
    if($save >0){
        echo 'ok';
    }
}