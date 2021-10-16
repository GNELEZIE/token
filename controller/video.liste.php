<?php
session_start();
$data_list = '';
if(isset($_SESSION['usermeetmee'])){
    extract($_POST);
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Utilisateur.class.php";


    $data = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();
    if($data['video'] != ''){
        $data_list = '
            <video src="media/videos/'.$data['video'].'" controls loop controlslist="nodownload"  style="height: 200px"></video>
    ';
    }
}

$output = array(
    'fichierList' => $data_list
);
echo json_encode($output);