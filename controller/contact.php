<?php
if(!empty($_POST['nom']) and !empty($_POST['email']) and !empty($_POST['message']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']) {
    extract($_POST);

    $nom = htmlentities(trim(addslashes(strip_tags($nom))));
    $email = htmlentities(trim(addslashes(strip_tags($email))));
    $message= htmlentities(trim(addslashes(strip_tags($message))));
    $date = date('Y-m-d H:i');
    //define("destination", "zie.nanien@gmail.com"); // email
//        error_reporting (E_ALL ^ E_NOTICE);
//        $name 	 = 'Meetmee';
//        $email 	 = 'no-reply@meetmee.ch';
    $subject ='Nouveau message';
    $message = '
             <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=" " name="description" />
    <meta content="meetmee" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="'.$domaine.'/assets/images/favicon.png" type="image/x-icon" />
</head>

<body>
    <div class="container">

      <p>Message :</p>
      <p> '.$message.'</p>
    </div>

</body>
</html>
        ';
    $mail = mail("info@meetmee.ch", $subject, $message,
        "From: ".$nom." <".$email.">\r\n"
        ."Reply-To: ".$email."\r\n"
        ."Return-Path: " .$email. "\r\n"
        ."Date:  .$date. "
        ."Content-type: text/html; charset=UTF-8\r\n"
    );

    if($mail){
        $success['send']  = "Votre message a été envoyé avec success !!!";
    }else{
        $errors['message'] = 'Une erreur s\'est produite lors du traitement des données';

    }

}