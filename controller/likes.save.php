<?php
session_start();
if(isset($_SESSION['usermeetmee']) and isset($_POST['id'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Likes.class.php";

    extract($_POST);

    $id = htmlentities(trim(addslashes($id)));
    $date = date('Y-m-d H:i');
    $save = $likes->addLikes($date,$_SESSION['usermeetmee']['id_utilisateur'],$id);
    if($save >0){
        $nbrLikes = $likes->getLikesNbrByPub($id)->fetch();
        echo $nbrLikes['nb'];
    }
}