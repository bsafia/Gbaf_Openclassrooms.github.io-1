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
    if( isset($_POST['forminscription'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prénom = htmlspecialchars($_POST['prénom']);
        $nomuser = htmlspecialchars($_POST['nomuser']);
        $mail = htmlspecialchars($_POST['mail']);
        $question = htmlspecialchars($_POST['question']);
        $reponse = htmlspecialchars($_POST['reponse']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        
        if(!empty($_POST['nom']) && !empty($_POST['prénom']) && !empty($_POST['nomuser']) &&!empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['question']) &&!empty($_POST['reponse'])) {
                
            if($_POST['mdp'] == $_POST['mdp2']) {
                    $insertmbr = $bdd->prepare ("INSERT INTO inscription(nom, prenom, nomuser,mail, motdepasse, motdepasse2,question,reponse) VALUES(?,?,?,?,?,?,?,?)");
                    $insertmbr->execute(array($nom, $prénom, $nomuser, $mail, $mdp, $mdp2, $question, $reponse)); 
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prénom'] = $prénom;
                    header('Location: accueil.php');
                
            }
            else {
                echo "Vos mots de passes ne correspondent pas !";
            }
                    
                
        }
    }


//connexion

    
if( isset($_POST["formconnexion"])) {
    if(!empty($_POST['nom']) && !empty($_POST['mdp'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $mdp = sha1($_POST['mdp']);

        $requser = $bdd->prepare("SELECT * FROM inscription WHERE nom = ? AND motdepasse = ?");
        $requser->execute(array( $nom, $mdp));
        
        if($requser->rowCount() > 0) {
            $_SESSION['nom'] = $nom;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $requser->fetch()['id'];
            header('Location:accueil.php');
        }
        else {
            echo " Mauvais identifiant ou mot de passe !";
        }
        
    }
    else {
        echo "Veuillez compléter tous les champs...";
    }
} 
        
        

?>
