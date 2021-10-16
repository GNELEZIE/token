<?php
session_start();
if(isset($_SESSION['usermeetmee']) and isset($_POST['id'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Fichier.class.php";

    extract($_POST);

    $id = htmlentities(trim(addslashes($id)));
    $data = $fichier->getFichierById($id)->fetch();

    $delete = $fichier->deleteFichier($id);
    if($delete > 0){
        if($data['nom_fichier'] != ''){
            $fichier ='../media/fichiers/'.$data['nom_fichier'];
            if(file_exists($fichier)){
                unlink($fichier);
            }
        }
        echo 'ok';
    }
}