<?php
if(isset($_POST['idUser']) and isset($_POST['password']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $password = htmlentities(trim(addslashes($password)));
    $confpassword = htmlentities(trim(addslashes($confpassword)));
    $idUser = htmlentities(trim(addslashes($idUser)));
    $user = htmlentities(trim(addslashes($user)));

    $result = $utilisateur->getUtilisateurById($idUser);
    if($data = $result->fetch()){
        $cle = 'sk_Dju58eUcILm6!fE2e87';
        $arHash = array(
            $data['email'],
            $cle
        );
        $usr = strtoupper(hash('sha256', implode(':', $arHash)));
        if($usr == $user){
            if($password == $confpassword){
                $options = ['cost' => 12];
                $mdpCript = password_hash($password,PASSWORD_BCRYPT,$options);

                $update = $utilisateur->updatePassword($mdpCript,$idUser);
                if($update > 0){
                    $success['message'] = 'Mot de passe modifier avec succès';
                }
            }else{
                $errors['connect'] = 'Erreur de confirmation du mot de passe';
            }
        }else{
            $errors['connect'] = 'Une erreur s\'est produite lors de l\'activation du compte';
        }
    }else{
        $errors['connect'] = 'Une erreur s\'est produite lors de l\'activation du compte';
    }
}