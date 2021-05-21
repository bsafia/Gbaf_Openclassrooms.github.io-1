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
if (isset($_POST['forgetpw'])) {
    $nomuser = htmlspecialchars($_POST['nomuser']);
    $question = htmlspecialchars($_POST['question']);
    $reponse = htmlspecialchars($_POST['reponse']);
    $mdp = sha1($_POST['mdp']);
        if(!empty($_POST['nomuser'])&& !empty($_POST['question']) &&!empty($_POST['reponse'])) {
            $selectuser = $bdd->prepare ("SELECT * FROM inscription WHERE nomuser= ? ");
            $selectuser->execute(array($nomuser));
            $user=$selectuser->fetch();
            echo"Votre Question de securité ne corresponde pas !!!";
            if($question == $user['question'] && $reponse ==$user['reponse']) {
                if($_POST['mdp'] == $_POST['mdp2']) {
                    $insertmdp = $bdd->prepare("UPDATE inscription Set motdepasse= ? WHERE nomuser = ?");
                    $insertmdp->execute(array($mdp, $nomuser)); 
                    header("Location:Connexion.php");
                }
            }
        } 
}


