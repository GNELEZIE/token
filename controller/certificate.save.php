<?php
session_start();
if(isset($_SESSION['usermeetmee'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Certificate.class.php";

    $date = date('Y-m-d H:i');
    $typeImg = 0;
    if(!empty($_FILES['certifie']['name'])){
        $extensionValide = array('jpeg', 'jpg', 'png', 'pdf');

        $photo_ext = explode('.',$_FILES['certifie']['name']);
        $photo_ext = strtolower(end($photo_ext));

        if (in_array($photo_ext, $extensionValide)) {
            $photo = uniqid().'.'.$photo_ext;
            $destination = '../media/identification/'.$photo;
            $tmp_name = $_FILES['certifie']['tmp_name'];

            if(move_uploaded_file($tmp_name,$destination)){
                $save = $certificate->addCertificate($date,$_SESSION['usermeetmee']['id_utilisateur'],$photo);
                if($save >0){
                    echo 'ok';
                }
            }
        }
    }


}
