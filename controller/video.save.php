<?php
session_start();
if(isset($_SESSION['usermeetmee'])){
    extract($_POST);
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Utilisateur.class.php";

    $res = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();

    $ex_video = $res['video'];
    if(empty($_FILES['videos']['name'])){
        $video = $res['video'];
    }else{

        $extensionValide = array('mp4', 'avi', 'mpg', 'webm', 'ogg');

        $video_ext = explode('.',$_FILES['videos']['name']);
        $video_ext = strtolower(end($video_ext));

        if (in_array($video_ext, $extensionValide)) {
            $video = uniqid().'.'.$video_ext;
            $destination = '../media/videos/'.$video;
            $tmp_name = $_FILES['videos']['tmp_name'];

            if(move_uploaded_file($tmp_name,$destination)){
                if($ex_video  != ''){
                    $fichier ='../media/videos/'.$ex_video;
                    if(file_exists($fichier)){
                        unlink($fichier);
                    }
                }
            }
        }
    }
    $update = $utilisateur->updateUtilisateurVideo($video,$_SESSION['usermeetmee']['id_utilisateur']);
    if($update >0){
        echo 'ok';
    }
}
