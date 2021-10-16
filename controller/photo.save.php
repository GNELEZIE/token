<?php
session_start();
if(isset($_SESSION['usermeetmee'])){
    $data_info = '';
    $data_photo = '';
    extract($_POST);
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Utilisateur.class.php";

    $res = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();

    $ex_photo = $res['photo'];
    if(empty($_FILES['profilImg']['name'])){
        $photo = $res['photo'];
    }else{

        $extensionValide = array('jpeg', 'jpg', 'png');

        $photo_ext = explode('.',$_FILES['profilImg']['name']);
        $photo_ext = strtolower(end($photo_ext));

        if (in_array($photo_ext, $extensionValide)) {
            $photo = uniqid().'.'.$photo_ext;
            $destination = '../media/users/'.$photo;
            $tmp_name = $_FILES['profilImg']['tmp_name'];

            if(move_uploaded_file($tmp_name,$destination)){
                if($ex_photo  != ''){
                    $fichier ='../media/users/'.$ex_photo;
                    if(file_exists($fichier)){
                        unlink($fichier);
                    }
                }
            }
        }
    }
    $update = $utilisateur->updateUtilisateurPhoto($photo,$_SESSION['usermeetmee']['id_utilisateur']);
    if($update >0){
        $data = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();
        $data_info = 'ok';
        $data_photo = $domaine.'/media/users/'.$data['photo'];
    }
    $output = array(
        'data_info' => $data_info,
        'data_photo' => $data_photo
    );
    echo json_encode($output);
}
