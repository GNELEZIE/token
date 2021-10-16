<?php
if(isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $check69 = 0;
    if(isset($_POST['69'])){$check69 = 1;}
    $anulingus = 0;
    if(isset($_POST['anulingus'])){$anulingus = 1;}
    $branlette = 0;
    if(isset($_POST['branlette'])){$branlette = 1;}
    $pipe = 0;
    if(isset($_POST['pipe'])){$pipe = 1;}
    $couple = 0;
    if(isset($_POST['couple'])){$couple = 1;}
    $cunnilingus = 0;
    if(isset($_POST['cunnilingus'])){$cunnilingus = 1;}
    $domination = 0;
    if(isset($_POST['domination'])){$domination = 1;}
    $check69 = 0;
    if(isset($_POST['69'])){$check69 = 1;}
    $penetration = 0;
    if(isset($_POST['2penetration'])){$penetration = 1;}
    $duo = 0;
    if(isset($_POST['duo'])){$duo = 1;}
    $ejacuCorps = 0;
    if(isset($_POST['ejacuCorps'])){$ejacuCorps = 1;}
    $ejacuFacial = 0;
    if(isset($_POST['ejacuFacial'])){$ejacuFacial = 1;}
    $facesitting = 0;
    if(isset($_POST['facesitting'])){$facesitting = 1;}
    $fellation = 0;
    if(isset($_POST['fellation'])){$fellation = 1;}
    $fetichisme = 0;
    if(isset($_POST['fetichisme'])){$fetichisme = 1;}
    $french = 0;
    if(isset($_POST['french'])){$french = 1;}
    $gfe = 0;
    if(isset($_POST['gfe'])){$gfe = 1;}
    $gorge = 0;
    if(isset($_POST['gorge'])){$gorge = 1;}
    $jeux = 0;
    if(isset($_POST['jeux'])){$jeux = 1;}
    $lingerie = 0;
    if(isset($_POST['lingerie'])){$lingerie = 1;}
    $massage = 0;
    if(isset($_POST['massage'])){$massage = 1;}
    $masturbation = 0;
    if(isset($_POST['masturbation'])){$masturbation = 1;}
    $pornStar = 0;
    if(isset($_POST['pornStar'])){$pornStar = 1;}
    $rapport = 0;
    if(isset($_POST['rapport'])){$rapport = 1;}
    $serviceVip = 0;
    if(isset($_POST['serviceVip'])){$serviceVip = 1;}
    $sexeGroupe = 0;
    if(isset($_POST['sexeGroupe'])){$sexeGroupe = 1;}
    $sexToys = 0;
    if(isset($_POST['sexToys'])){$sexToys = 1;}
    $sodomie = 0;
    if(isset($_POST['sodomie'])){$sodomie = 1;}
    $striptease = 0;
    if(isset($_POST['striptease'])){$striptease = 1;}


    $francais = 0;
    if(isset($_POST['francais'])){$francais = 1;}
    $anglais = 0;
    if(isset($_POST['anglais'])){$anglais = 1;}
    $arabe = 0;
    if(isset($_POST['arabe'])){$arabe = 1;}
    $espagnol = 0;
    if(isset($_POST['espagnol'])){$espagnol = 1;}
    $allemand = 0;
    if(isset($_POST['allemand'])){$allemand = 1;}
    $italien = 0;
    if(isset($_POST['italien'])){$italien = 1;}
    $portugais = 0;
    if(isset($_POST['portugais'])){$portugais = 1;}
    $russe = 0;
    if(isset($_POST['russe'])){$russe = 1;}
    $chinois = 0;
    if(isset($_POST['chinois'])){$chinois = 1;}
    $chf = 0;
    if(isset($_POST['chf'])){$chf = 1;}
    $euro = 0;
    if(isset($_POST['euro'])){$euro = 1;}
    $dollars = 0;
    if(isset($_POST['dollars'])){$dollars = 1;}
    $twint = 0;
    if(isset($_POST['twint'])){$twint = 1;}
    $visa = 0;
    if(isset($_POST['visa'])){$visa = 1;}
    $mastercard = 0;
    if(isset($_POST['mastercard'])){$mastercard = 1;}
    $express = 0;
    if(isset($_POST['express'])){$express = 1;}
    $maestro = 0;
    if(isset($_POST['maestro'])){$maestro = 1;}
    $paypal = 0;
    if(isset($_POST['paypal'])){$paypal = 1;}
    $postfinance = 0;
    if(isset($_POST['postfinance'])){$postfinance = 1;}
    $bitcoin = 0;
    if(isset($_POST['bitcoin'])){$bitcoin = 1;}

    $dataVerif = $utilisateur->getUtilisateurById($_SESSION['usermeetmee']['id_utilisateur'])->fetch();
    if($dataVerif['type_compte'] == 1){
        $tarif = htmlentities(trim(addslashes(strip_tags($tarif))));
        $mobilite = htmlentities(trim(addslashes(strip_tags($mobilite))));

        $update = $prestation->updatePrestation($check69,$anulingus,$branlette,$pipe,$couple,$cunnilingus,$domination,$penetration,$duo,$ejacuCorps,$ejacuFacial,$facesitting,$fellation,$fetichisme,$french,$gfe,$gorge,$jeux,$lingerie,$massage,$masturbation,$pornStar,$rapport,$serviceVip,$sexeGroupe,$sexToys,$sodomie,$striptease,$_SESSION['usermeetmee']['id_utilisateur']);
        $upd = $infos->updateInfos($francais,$anglais,$arabe,$espagnol,$allemand,$italien,$portugais,$russe,$chinois,$chf,$euro,$dollars,$twint,$visa,$mastercard,$express,$maestro,$paypal,$postfinance,$bitcoin,$mobilite,$tarif,$_SESSION['usermeetmee']['id_utilisateur']);
        if($upd >0){
            $success['success'] = 'Toutes les modifications ont été effectuées avec succès';
        }
    }elseif($dataVerif['type_compte'] == 2){
        $olundi = htmlentities(trim(addslashes(strip_tags($olundi))));
        $flundi = htmlentities(trim(addslashes(strip_tags($flundi))));
        $omardi = htmlentities(trim(addslashes(strip_tags($omardi))));
        $fmardi = htmlentities(trim(addslashes(strip_tags($fmardi))));
        $omercredi = htmlentities(trim(addslashes(strip_tags($omercredi))));
        $fmercredi = htmlentities(trim(addslashes(strip_tags($fmercredi))));
        $ojeudi = htmlentities(trim(addslashes(strip_tags($ojeudi))));
        $fjeudi = htmlentities(trim(addslashes(strip_tags($fjeudi))));
        $ovendredi = htmlentities(trim(addslashes(strip_tags($ovendredi))));
        $fvendredi = htmlentities(trim(addslashes(strip_tags($fvendredi))));
        $osamedi = htmlentities(trim(addslashes(strip_tags($osamedi))));
        $fsamedi = htmlentities(trim(addslashes(strip_tags($fsamedi))));
        $odimanche = htmlentities(trim(addslashes(strip_tags($odimanche))));
        $fdimanche = htmlentities(trim(addslashes(strip_tags($fdimanche))));

        $update = $prestation->updatePrestation($check69,$anulingus,$branlette,$pipe,$couple,$cunnilingus,$domination,$penetration,$duo,$ejacuCorps,$ejacuFacial,$facesitting,$fellation,$fetichisme,$french,$gfe,$gorge,$jeux,$lingerie,$massage,$masturbation,$pornStar,$rapport,$serviceVip,$sexeGroupe,$sexToys,$sodomie,$striptease,$_SESSION['usermeetmee']['id_utilisateur']);
        $upd = $infos->updateInfosHoraire($francais,$anglais,$arabe,$espagnol,$allemand,$italien,$portugais,$russe,$chinois,$chf,$euro,$dollars,$twint,$visa,$mastercard,$express,$maestro,$paypal,$postfinance,$bitcoin,$olundi,$flundi,$omardi,$fmardi,$omercredi,$fmercredi,$ojeudi,$fjeudi,$ovendredi,$fvendredi,$osamedi,$fsamedi,$odimanche,$fdimanche,$_SESSION['usermeetmee']['id_utilisateur']);
        if($upd >0){
            $success['success'] = 'Toutes les modifications ont été effectuées avec succès';
        }
    }else{}


}
