<?php
session_start();
if(isset($_SESSION['usermeetmee'])){
    extract($_POST);
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Fichier.class.php";

    $date = date('Y-m-d H:i');
    $typeImg = 0;
    if(!empty($_FILES['photo']['name'])){
        $extensionValide = array('jpeg', 'jpg', 'png');

        $photo_ext = explode('.',$_FILES['photo']['name']);
        $photo_ext = strtolower(end($photo_ext));

        if (in_array($photo_ext, $extensionValide)) {
            $photo = uniqid().'.'.$photo_ext;
            $destination = '../media/fichiers/'.$photo;
            $tmp_name = $_FILES['photo']['tmp_name'];

            if(move_uploaded_file($tmp_name,$destination)){
                $save = $fichier->addFichier($date,$_SESSION['usermeetmee']['id_utilisateur'],$typeImg,$photo);
                if($save >0){
                    echo 'ok';
                }
            }
        }
    }


}
