<?php
session_start();
if(isset($_SESSION['usermeetmee']) and isset($_POST['id'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Utilisateur.class.php";

    extract($_POST);

    $id = htmlentities(trim(addslashes($id)));
    $etat = 1;
    $upd = $utilisateur->updateBloquer($etat,$id);
    if($upd >0){
        echo 'ok';
    }
}