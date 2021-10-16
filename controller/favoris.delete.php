<?php
session_start();
if(isset($_SESSION['usermeetmee']) and isset($_POST['id'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Favoris.class.php";

    extract($_POST);

    $id = htmlentities(trim(addslashes($id)));

    $delete = $favoris->deleteFavoris($_SESSION['usermeetmee']['id_utilisateur'],$id);
    if($delete > 0){
        echo 'ok';
    }
}