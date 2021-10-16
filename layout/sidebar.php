<?php
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
?>

<aside class="sidebar">
    <div class="component">
        <div class="card-body p-0 profil-card">
            <div class="profile-userpic">
                <div>
                    <img src="media/users/<?php if($data['photo'] != ''){echo $data['photo'];}else{echo 'defaultuser.png';}?>" class="img-pro" id="img">
                    <span class="fa fa-spin fa-spinner loader"></span>
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?=html_entity_decode(stripslashes($data['pseudo']))?> </div>
                    <?php
                    if($data['admin'] != 1){
                        ?>
                        <div class="profile-usertitle-job">Escort <?=$ville?></div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                if($data['admin'] != 1){
                    ?>
                    <div class="profile-userbuttons">
                        <form method="post" id="imgForm">
                            <input type="file" name="profilImg" id="profilImg" style="display: none" />
                            <button type="button" id="btn-img" class="btn btn-info btn-sm editimgbtn">
                                <i class="fas fa-edit"></i>Modifier la photo de profil
                            </button>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</aside>
