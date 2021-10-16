<?php
session_start();
if(isset($_SESSION['usercotga']) and !empty($_POST['id'])){
    // include function
    include_once "../assets/function/function.php";
    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Utilisateur.class.php";
    $data = array();
    extract($_POST);
    $id = htmlentities(trim(addslashes($id)));
    $result = $utilisateur->getUtilisateurById($id)->fetch();
    if($result['avatar'] != ''){
        $avatar = '../media/users/'.$result['avatar'];
    }else{
        $avatar = '../media/users/defaultuser.png';
    }
    if($result['code'] == '' or $result['phone'] == ''){
        $phone = '';
    }else{
        $phone = '(+'.$result['code'].')'.$result['phone'];
    }
    if($result['cv_user'] != ''){
        $cv = '<a href="../media/fichiers/'.$result['cv_user'].'" class="btn btn-outline-success btn-rounded waves-light waves-effect"><i class="fe-download"></i>Télécharger le cv</a>';
    }else{
        $cv = '';
    }
    $data = array(
        $avatar,
        $result['email'],
        html_entity_decode(stripslashes($result['civilite'])),
        html_entity_decode(stripslashes($result['nom'])),
        html_entity_decode(stripslashes($result['prenom'])),
        html_entity_decode(stripslashes($result['situation'])),
        html_entity_decode(stripslashes($result['university'])),
        html_entity_decode(stripslashes($result['pays'])),
        $phone,
        $cv
    );
    echo json_encode($data);
}