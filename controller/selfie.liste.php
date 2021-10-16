<?php
session_start();
$data_list = '';
if(isset($_SESSION['usermeetmee'])){
    extract($_POST);
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Fichier.class.php";


    $liste = $fichier->getFichierByTypeUser($_SESSION['usermeetmee']['id_utilisateur'],1);

    while($data = $liste->fetch()) {
        if($data['nom_fichier'] != ''){
            $data_list .= '
                    <div class="col-md-4 mb-3 mytrash">
                        <a href="javascript:void(0)" class="supimg" onclick="supSelfie('.$data['id_fichier'].')" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <img src="'.$domaine.'/media/fichiers/'.$data['nom_fichier'].'" >
                    </div>
            ';
        }
    }

}

$data_list .= '
        <div class="col-md-4 mb-3 loaderSelfie" style="display: none">
            <img src="media/fichiers/defaut-img.png">
            <i class="fa fa-circle-notch fa-spin" style="font-size: 30px;color: #197ecc;position: absolute; top:45%; left: 45%"></i>
        </div>
        <div class="col-md-4 mb-3">
            <a href="javascript:void(0)" onclick="ajoutSelfie()" title="Ajouter des selfies">
                <div class="w-100 text-center" style="background-color: #fafafa;padding-top: 20%; padding-bottom: 20%">
                    <i class="mdi mdi-plus-circle-outline" style="font-size: 50px; color: #cdcdcd"></i>
                </div>
            </a>
        </div>
        ';
$output = array(
    'fichierList' => $data_list
);
echo json_encode($output);