<?php
if(isset($_POST['email']) and isset($_POST['password']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    $email = htmlentities(trim(addslashes(strip_tags($email))));
    $password = htmlentities(trim(addslashes($password)));

    if($password != ''){
        $result = $utilisateur->getUtilisateurByEmail($email);
        if($data = $result->fetch()){
                if($data['bloquer'] == 0){
                    if(password_verify($password,$data['mot_de_passe'])){
                        $_SESSION['usermeetmee'] = $data;
                        if(isset($_POST['remember'])){
                            $user = my_encrypt($data['email']);
                            setcookie('meetmee',$user,time()+60*60*24*30,'/',$cookies_domaine,true,true);
                        }
                        if(isset($_GET['return'])){
                            header('location:'.$_GET['return']);
                        }else{
                            if($data['admin'] == 1){
                                header('location:dashboard-admin');
                            }else{
                                header('location:dashboard');
                            }
                        }
                        exit();
                    }else{
                        $errors['connect'] = 'Username ou mot de passe incorrect';
                    }
                }else{
                    $errors['connect'] = 'Votre compte a été bloqué';
                }
        }else{
            $errors['connect'] = 'Username ou mot de passe incorrect';
        }
    }else{
        $errors['connect'] = 'Username ou mot de passe incorrect';
    }
}