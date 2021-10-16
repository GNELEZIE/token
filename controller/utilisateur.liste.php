<?php
session_start();
$arr_list = array('data' => array());
if(isset($_SESSION['usermeetmee'])){
    // include function
    include_once "../assets/function/function.php";

    //Include Connexion
    include_once '../class/connexion.php';
    include_once "../class/Utilisateur.class.php";

    $liste = $utilisateur->getUtilisateurAllAdmin();

    while($data = $liste->fetch()) {
        if($data['bloquer'] == 0){
            $btn = '<a class="dropdown-item" href="javascript:void(0)" style="color: #ff0000" onclick="bloquer('.$data['id_utilisateur'].')"><i class="mdi mdi-block-helper mr-2 vertical-middle" style="font-size: 13px;"></i>Bloquer</a>';
        }else{
            $btn = '<a class="dropdown-item" href="javascript:void(0)" style="color: #008000" onclick="debloquer('.$data['id_utilisateur'].')"><i class="mdi mdi-check-circle-outline mr-2 vertical-middle"></i>Debloquer</a>';
        }
        $action = '
               <td>
                   <div class="btn-group dropdown">
                       <a href="javascript:void(0);" class="table-action-btn dropdown-toggle option-table" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                       <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                           <a class="dropdown-item mr-2" href="filles/'.$data['pseudo'].'" style="color: #0e78ff" target="_blank"><i class="mdi mdi-eye mr-2 vertical-middle"></i>Voir le profil</a>
                           '.$btn.'
                       </div>
                   </div>
               </td>
        ';
        if($data['type_compte'] == 1){
            $type = '<i class="badge badge-success">Indépendant</i>';
        }elseif($data['type_compte'] == 2){
            $type = '<i class="badge badge-danger">Agence</i>';
        }else{
            $type = '<i class="badge badge-info">Membre</i>';
        }

        $ville = '';
        if($data['ville'] == 1){$ville = 'Genève';}
        if($data['ville'] == 2){$ville = 'Carouge';}
        if($data['ville'] == 3){$ville = 'Chambésy';}
        if($data['ville'] == 4){$ville = 'Champel';}
        if($data['ville'] == 5){$ville = 'Cité-Centre';}
        if($data['ville'] == 6){$ville = 'Cornavin';}
        if($data['ville'] == 7){$ville = 'Eaux-vives';}
        if($data['ville'] == 8){$ville = 'Plainpalais';}
        if($data['ville'] == 9){$ville = 'Plan-les-Ouate';}
        if($data['ville'] == 10){$ville = 'Servette';}
        if($data['ville'] == 11){$ville = 'Thônex';}
        if($data['ville'] == 12){$ville = 'Versoix';}
        if($data['ville'] == 13){$ville = 'Aigle';}
        if($data['ville'] == 14){$ville = 'Aubonne';}
        if($data['ville'] == 15){$ville = 'Bex';}
        if($data['ville'] == 16){$ville = 'Bussigny';}
        if($data['ville'] == 17){$ville = 'Chavannes-Renens';}
        if($data['ville'] == 18){$ville = 'Clarens';}
        if($data['ville'] == 19){$ville = 'Coppet';}
        if($data['ville'] == 20){$ville = 'Corcelles-près-Payerne';}
        if($data['ville'] == 21){$ville = 'Crissier';}
        if($data['ville'] == 22){$ville = 'Gland';}
        if($data['ville'] == 23){$ville = 'Lausanne';}
        if($data['ville'] == 24){$ville = 'Montreux';}
        if($data['ville'] == 25){$ville = 'Morges';}
        if($data['ville'] == 26){$ville = 'Moudon';}
        if($data['ville'] == 27){$ville = 'Nyon';}
        if($data['ville'] == 28){$ville = 'Payerne';}
        if($data['ville'] == 29){$ville = 'Prilly';}
        if($data['ville'] == 30){$ville = 'Renens';}
        if($data['ville'] == 31){$ville = 'Roche';}
        if($data['ville'] == 32){$ville = 'Vevey';}
        if($data['ville'] == 33){$ville = 'Yverdon-les-Bains';}
        if($data['ville'] == 34){$ville = 'Aproz';}
        if($data['ville'] == 35){$ville = 'Ardon';}
        if($data['ville'] == 36){$ville = 'Brig';}
        if($data['ville'] == 37){$ville = 'Collombey';}
        if($data['ville'] == 38){$ville = 'Conthey';}
        if($data['ville'] == 39){$ville = 'Martigny';}
        if($data['ville'] == 40){$ville = 'Massongex';}
        if($data['ville'] == 41){$ville = 'Monthey';}
        if($data['ville'] == 42){$ville = 'Grône';}
        if($data['ville'] == 43){$ville = 'Saillon';}
        if($data['ville'] == 44){$ville = 'Saint-Léonard';}
        if($data['ville'] == 45){$ville = 'Saint-Maurice';}
        if($data['ville'] == 46){$ville = 'Saxon';}
        if($data['ville'] == 47){$ville = 'Sierre';}
        if($data['ville'] == 48){$ville = 'Sion';}
        if($data['ville'] == 49){$ville = 'Turtmann';}
        if($data['ville'] == 50){$ville = 'Vétroz';}
        if($data['ville'] == 51){$ville = 'Visp';}
        if($data['ville'] == 52){$ville = 'La Chaux-de-Fonds';}
        if($data['ville'] == 53){$ville = 'Le Locle';}
        if($data['ville'] == 54){$ville = 'Neuchâtel';}
        if($data['ville'] == 55){$ville = 'Bassecourt';}
        if($data['ville'] == 56){$ville = 'Boncourt';}
        if($data['ville'] == 57){$ville = 'Courrendlin';}
        if($data['ville'] == 58){$ville = 'Delémont';}
        if($data['ville'] == 59){$ville = 'Moutier';}
        if($data['ville'] == 60){$ville = 'Porrentruy';}
        if($data['ville'] == 61){$ville = 'Bulle';}
        if($data['ville'] == 62){$ville = 'Châtel-Saint-Denis';}
        if($data['ville'] == 63){$ville = 'Düdingen';}
        if($data['ville'] == 64){$ville = 'Fribourg';}
        if($data['ville'] == 65){$ville = 'Marly';}
        if($data['ville'] == 66){$ville = 'Romont';}
        if($data['ville'] == 67){$ville = 'Berne';}
        if($data['ville'] == 68){$ville = 'Biel/Bienne';}
        if($data['ville'] == 69){$ville = 'Thun';}
        if($data['ville'] == 70){$ville = 'Zollikofen';}
        if($data['ville'] == 71){$ville = 'Bassersdorf';}
        if($data['ville'] == 72){$ville = 'Schwerzenbach';}
        if($data['ville'] == 73){$ville = 'Pfäffikon (Zurich)';}
        if($data['ville'] == 74){$ville = 'Dietikon';}
        if($data['ville'] == 75){$ville = 'Dübendorf';}
        if($data['ville'] == 76){$ville = 'Zürich';}
        if($data['ville'] == 77){$ville = 'Aarau';}
        if($data['ville'] == 78){$ville = 'Basel';}
        if($data['ville'] == 79){$ville = 'Lucerne';}
        if($data['ville'] == 80){$ville = 'Glaris';}
        if($data['ville'] == 81){$ville = 'Saint-Gall';}
        if($data['ville'] == 82){$ville = 'Solothurn';}

        if($data['certificate'] == 1){
            $pseudo = html_entity_decode(stripslashes($data['pseudo'])).' <i class="fas fa-check-circle" style="color: #008000;font-size: 13px"></i>';
        }else{
            $pseudo = html_entity_decode(stripslashes($data['pseudo']));
        }

        $arr_list['data'][] = array(
            date_fr($data['date_utilisateur']),
            $pseudo,
            $type,
            html_entity_decode(stripslashes($data['email'])),
            $data['age'],
            $ville,
            $action
        );
    }
}

echo json_encode($arr_list);
