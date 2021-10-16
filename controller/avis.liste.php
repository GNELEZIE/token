<?php
session_start();
$data_list = '';
if(isset($_POST['pubId'])){
    extract($_POST);
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Avis.class.php";

    $pubId = htmlentities(trim(addslashes($pubId)));

    $liste = $avis->getAvisByProfil($pubId);

    while($data = $liste->fetch()) {
        $data_list .= '
            <li>
                <div class="ltn__comment-item clearfix">
                    <div class="ltn__commenter-img mr-0">
                        <img src="'.$domaine.'/media/users/defaultuser.png" alt="Image" class="w-75" style="border: solid 1px #fcfcfc">
                    </div>
                    <div class="ltn__commenter-comment">
                        <p class="mb-0"><i class="font-weight-bold">'.html_entity_decode(stripslashes($data['pseudo'])).'</i> - <small>'.date_time_fr($data['date_avis']).'</small></p>
                        <p>'.html_entity_decode(stripslashes($data['contenu'])).'</p>
                    </div>
                </div>
            </li>
            ';
    }

}

$output = array(
    'fichierList' => $data_list
);
echo json_encode($output);