<?php
if(!empty($_POST['email']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']) {
    extract($_POST);

    $email = htmlentities(trim(addslashes($email)));
    $result = $utilisateur->getUtilisateurByEmail($email);

    if($data = $result->fetch()){

        $username = $data['pseudo'];
        define("destination", $data['email']); // email

        error_reporting (E_ALL ^ E_NOTICE);
        $cle = 'sk_Dju58eUcILm6!fE2e87';
        $arHash = array(
            $data['email'],
            $cle
        );
        $usr = strtoupper(hash('sha256', implode(':', $arHash)));

        $name 	 = 'Meetmee';
        $email 	 = 'no-reply@meetmee.ch';
        $subject = trim('Modification du mot de passe');
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
<style>
        body{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box; font-size: 14px;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6em;
            background-color: #f6f6f6;
            margin: 0;
        }

        .body-wrap{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            width: 100%;
            background-color: #f6f6f6;
            margin: 0;
        }


        tr{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            margin: 0;
        }


        td{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            vertical-align: top;
            margin: 0;
        }



        td.container{
            width:600px;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            vertical-align: top;
            display: block !important;
            max-width: 600px !important;
            clear: both !important;
            margin: 0 auto;

        }


        div.content{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px; max-width: 600px;
            display: block;
            margin: 0 auto;
            padding: 20px;
        }

        table.main{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            border-radius: 3px;
            margin: 0; border: none;
        }

        td.content-wrap{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            vertical-align: top;
            margin: 0;padding: 30px;
            border: 3px solid #e4a7c9;
            display: inline-block;
            border-radius: 7px;
            background-color: #fff;

        }

        meta.mymeta{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            margin: 0;
        }

        td a{
            display: block;
            margin-bottom: 10px;
        }

        td.content-block{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            vertical-align: top;
            margin: 0;
            padding: 0 0 20px;


        }

        .td-logo{
            text-align: center;
        }

        td.content-block a.btn-primary{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            color: #FFF;
            text-decoration: none;
            line-height: 2em;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 5px;
            background-color: #e60073;
            margin: 0;
            border-color: #e60073;
            border-style: solid;
            border-width: 8px 16px;
        }


        div.desabonne{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 14px;
            width: 100%;
            clear: both;
            color: #999;
            margin: 0;

        }



        td.aligncenter{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 12px;
            vertical-align: top;
            color: #999;
            text-align: center;
            margin: 0;
            padding: 0 0 20px;
        }


        a.desabon{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            box-sizing: border-box;
            font-size: 12px;
            color: #999;
            text-decoration: underline;
            margin: 0;

        }
    </style>
</head>

<body>

<table class="body-wrap">
    <tr>
        <td valign="top"></td>
        <td class="container" valign="top">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="https://schema.org/ConfirmAction">
                    <tr>
                        <td class="content-wrap" valign="top">
                            <meta itemprop="name" content="Confirm Email"  class="mymeta">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="td-logo">
                                        <a href="'.$domaine.'"><img src="'.$domaine.'/assets/images/logo.png" height="50" alt="logo"/></a> <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" valign="top">
                                        <h3>Modification de mot de passe</h3>
                                        <h5>Bonjour '.$data['pseudo'].',</h5>
                                        Pour modifier votre mot de passe Meetmee, vous devez cliquer sur le lien ci-dessous.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" itemprop="handler" itemscope itemtype="https://schema.org/HttpActionHandler" valign="top">
                                        <a href="'.$domaine.'/update-pw/'.$data['id_utilisateur'].'/'.$usr.'" class="btn-primary" itemprop="url">Modifier votre mot de passe</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" valign="top">
                                        Après avoir modidfier votre de passe,vous pourriez acceder facilement à votre compte. Nous vous souhaitons une très bonne expérience.
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">Cordialement, <br/>Meetmee</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td valign="top"></td>
    </tr>
</table>
<div class="desabonne pt-0">
    <table width="100%">
        <tr>
            <td class="aligncenter content-block" align="center" valign="top">
                Merci de ne passe répondre à cet email. Pour nous contacter, cliquez sur <a href="'.$domaine.'" class="desabon">Aide et contact</a><br/>
                Copyright © 2021 Meetmee. Tous droits réservés.
            </td>
        </tr>
    </table>
</div>
</body>
</html>
        ';

        $mail = mail(destination, $subject, $message,
            "From: ".$name." <".$email.">\r\n"
            ."Reply-To: ".$email."\r\n"
            ."Return-Path: " .$email. "\r\n"
            ."MIME-Version: 1.0\r\n"
            ."Content-type: text/html; charset=UTF-8\r\n"
        );

        if($mail){
            $success['send']  = "Vous allez recevoir un email pour réinitialiser votre de passe. Vérifier dans vos spam.";
        }else{
            $errors['message'] = 'Une erreur s\'est produite lors du traitement des données';
        }
    }else{
        $errors['message'] = 'Cette adresse email n\'existe pas';
    }

}