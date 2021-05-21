<?php
session_start();

try{
    $bdd = new PDO('mysql:host=test.test;dbname=gbaf;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
        //connexion myAdmin
        
}

if(isset($_POST['formconnexion'])) {
    $nomconnect = htmlspecialchars($_POST['nomconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($nomconnect) AND !empty($mdpconnect)) {
       $requser = $bdd->prepare("SELECT * FROM inscription WHERE nom = ? AND motdepasse = ?");
       $requser->execute(array($nomconnect, $mdpconnect));
       $userexist = $requser->rowCount();
       echo $userexist;
       if($userexist == 1) {
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['nom'] = $userinfo['nom'];
        $_SESSION['prénom'] = $userinfo['prenom'];
        $_SESSION['nomuser'] = $userinfo['nomuser'];
        $_SESSION['mail'] = $userinfo['mail'];
          header("Location: accueil.php?id=".$_SESSION['id']);
       } else {
          $erreur = "Mauvais mail ou mot de passe !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel ="stylesheet" href="style2.css">-->
    <title>connexion</title>
</head>
    <div class="img_logo">
        <img src="logo.jpg"  id="logo_inscription" alt="page-logo">
    </div>
<body class="container">
    <form action="" method="post" class="login_form">
        <div class="title">Connexion</div>
        <div class="flex_input">
            <label for="">Utilisateur:</label>
            <input type="text" name="nomconnect" placeholder="votre Nom" >
        </div>
        <div class="flex_input">
            <label for="">Mot de passe:</label>
            <input type="password" name="mdpconnect" placeholder="Mot de passe" >
        </div>
        <div>
            <input type="submit" name="formconnexion" value="Se connecter">
        </div>
        <div class="flex_container">

        <div style="text-align:left">
                <a href="inscription.php">Inscrivez vous</a>
            </div>
            
            <div style="text-align:right">
                <a href="forgetpassword.php">Mot de passe oublie</a>
            </div>
            
        </div>
    </form>
    
</body>
</html>
<style>
    
    *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
    font-family: Georgia, 'Times New Roman', Times, serif;
}
    img{
    width: 100px;
    background:#fff;
    border-radius:5px;
    margin-bottom: 50px;
    
    }
    .container form .title{
        font-size: 25px;
        font-weight: 500;
        position: relative;
        text-align: center;
        padding-bottom: 20px;
    }
    .container{
        background: linear-gradient(135deg,#312f2f,#ce2525);
        display:flex;
        justify-content: center;
        height: 100vh;
        align-items: center;
        flex-direction: column;
    }
    .login_form{
        background-color:rgb(255, 255, 255,0.7);
        padding:25px 30px;
        width:500px;
        border-radius: 5px;
        margin-bottom: 97px;
    }
    input[type="text"],[type="password"]{
        width: 65%;
        padding:10px;
        outline: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }
    .flex_input{
        display: flex;
        flex-direction: row;
        margin-bottom: 10px;
    }
    label{
        flex-basis: 130px;
        margin-top: 10px;
        font-size: 17px;
    }
    input[type="submit"]{
        width:100%;
        outline:none;
        color: #fff;
        font-size: 20px;
        border-radius: 5px;
        letter-spacing: 1px;
        background: linear-gradient(135deg,#312f2f,#ce2525);
        margin:20px 0;

    }
    input[type="submit"]:hover{
        background: linear-gradient(-135deg,#312f2f,#ce2525);
    }
    .flex_container{
        display: flex;
    }
    .flex_container div{
        flex:1;
    }
    .flex_container a{
        text-decoration: none;
        color:#f75b5b; 
    }
    .flex_container a:hover{
        text-decoration:underline;
    }
    @media all and (max-width: 480px){
       .login_form{
           width: 100%;
       }
    }
    </style>
















