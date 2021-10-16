<?php
if(isset($_POST['password']) and isset($_POST['npassword']) and isset($_POST['cnpassword']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){

    extract($_POST);

    $password = htmlentities(trim(addslashes($password)));
    $npassword = htmlentities(trim(addslashes($npassword)));
    $cnpassword = htmlentities(trim(addslashes($cnpassword)));
    if($npassword == $cnpassword){
        $result = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur']);
        if($data = $result->fetch()){
            if(password_verify($password,$data['mot_de_passe'])){
                $options = ['cost' => 12];
                $mdpCript = password_hash($npassword,PASSWORD_BCRYPT,$options);
                $update = $utilisateur->updatePassword($mdpCript,$_SESSION['usermeetmee']['id_utilisateur']);
                if($update >0){
                    $success['success'] = 'Votre mot de passe a été modifié avec succès';
                }
            }else{
                $errors['connect'] = 'L\'ancien mot de passe n\'est pas correct';
            }
        }else{
            $errors['connect'] = 'Une erreur s\'est produite lors du traitement des données';
        }
    }else{
        $errors['connect'] = 'Le mot de passe ne correspond pas';
    }
}elseif(!isset($_POST)){
    $errors['connect'] = 'Une erreur s\'est produite lors du traitement des données !';
}