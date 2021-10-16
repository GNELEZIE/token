<?php
ini_set("session.cookie_httponly", True);
session_start();

// include function
include_once "assets/function/function.php";

//Include Connexion
include_once 'class/connexion.php';

// appelle des class
include_once "class/Utilisateur.class.php";
include_once "class/Prestation.class.php";
include_once "class/Infos.class.php";
include_once "class/Fichier.class.php";
include_once "class/Favoris.class.php";
include_once "class/Avis.class.php";
include_once "class/Likes.class.php";
include_once "class/Categorie.class.php";
include_once "class/Certificate.class.php";





if(isset($_COOKIE['meetmee']) AND !isset($_SESSION['usermeetmee'])){
    $email = my_decrypt($_COOKIE['meetmee']);
    $result = $utilisateur->getUtilisateurByEmail($email);
    if($data = $result->fetch()){
        if($data['bloquer'] == 0){
            $_SESSION['usermeetmee'] = $data;
        }else{
            setcookie('meetmee',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
        }
    }else{
        setcookie('meetmee',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
    }
}

if(isset($_SESSION['usermeetmee'])){
    $result = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur']);
    if($data = $result->fetch()){
        if($data['bloquer'] != 0){
            if(isset($_COOKIE['meetmee'])) {
                setcookie('meetmee',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
            }
            unset($_SESSION['usermeetmee']);
        }
    }else{
        unset($_SESSION['usermeetmee']);
    }
}
