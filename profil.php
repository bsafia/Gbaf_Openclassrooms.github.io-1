<?php
session_start(); 

try{
    $bdd = new PDO('mysql:host=test.test;dbname=gbaf;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
        
}



if(isset($_SESSION['id'])) {
    $req = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
    $req->execute(array($_SESSION['id']));
    
    if($req->rowCount() ==1) {
        $reqp = $req->fetch();

    } else {
        die('introuvable');
    }  
}
if(isset($_SESSION['nom'])) {
    if($_SESSION['nom'] == $reqp['id']) {

    }
    $set = 1;
}
    else{
        $set = 0;
    }

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mon Compte</title>
            <link rel ="stylesheet" href="style1.css">
        </head> 
    <div class="img_logo">
        <img src="logo.jpg"  id="logo_inscription" alt="page-logo">
    </div>     
        <body>
            <div class="container">
                <div class="title">MON COMPTE</div>                   
                    <form action="update.php" method="POST">
                        <div class="user_details">
                            <div class="input_box">
                                <span class="details">Nom</span>
                                    <input type="text" id="nom" name="newnom"  value="<?= $reqp['nom']; ?>" class="form_input" />
                            </div>
                            <div class="input_box">
                                <span class="details">Prénom</span>
                                    <input type="text"  name="newprenom"  value="<?= $reqp['prenom']; ?>" class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Nom utilisateur</span>
                                    <input type="text"  name="newnomuser" value="<?= $reqp['nomuser']; ?>" class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">E-mail</span>
                                    <input type="email"  name="newmail"  value="<?= $reqp['mail']; ?>" class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Nouveau Mot de passe</span>
                                    <input type="password"  name="newmdp1"  class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Confirmation Mot de passe</span>
                                    <input type="password"  name="newmdp2" class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Question</span>
                                <select id="question" name="question" class="form_input" >
                                    <optio value="">-Choississez-</option>
                                    <option value="voiture">Quel est le modèle de votre première voiture ?</option>
                                    <option value="école">Quel est le nom de votre école primaire ?</option>
                                    <option value=" animal">Quel est le nom de votre premier animal dosmestique ?</option>
                                </select>
                            </div>
                                    
                            <div class="input_box">
                                <span class="details">Réponse</span>
                                    <input type="text"  name="reponse" class="form_input" required />
                            </div>
                            <div class="button">
                                <?php if($set == 1) { ?>
                            <a href="update.php"> <input type="submit" name="update" value="Modifier"></a>
                        <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </body>
</html>                