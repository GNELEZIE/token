<?php
if(isset($_POST['email']) and isset($_POST['compte']) and isset($_POST['password']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $email = htmlentities(trim(addslashes(strip_tags($email))));
    $compte = htmlentities(trim(addslashes(strip_tags($compte))));
    $password = htmlentities(trim(addslashes(strip_tags($password))));
    $cfpassword = htmlentities(trim(addslashes($cfpassword)));
    $date = date('Y-m-d H:i');

    $emailUser = 'email';
    $verifMail = $utilisateur->verifUtilisateur($emailUser,$email);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['register'] = 'Votre adresse email n\'est pas correct';
    }elseif($verifMail->rowCount() > 0){
        $errors['register'] = 'Votre adresse email existe déjà';
    }elseif($password != $cfpassword){
        $errors['register'] = 'Erreur lors de la confirmation du mot de passe';
    }else{
        $options = ['cost' => 12];
        $mdpCript = password_hash($password,PASSWORD_BCRYPT,$options);
        $idUser = $utilisateur->addUtilisateur($date,$email,$compte,$mdpCript);
        if($idUser >0){
            $savePresta = $prestation->addPrestation($idUser);
            $saveInfos = $infos->addInfos($idUser);
            $result = $utilisateur->getUtilisateurById($idUser);
            if($data = $result->fetch()){
                $_SESSION['usermeetmee'] = $data;
                header('location:dashboard');
            }
        }
    }
}