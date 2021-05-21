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
        //tous les champs sont remplis
        if(!empty($_POST['nom']) && !empty($_POST['prénom']) && !empty($_POST['nomuser']) &&!empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['question']) &&!empty($_POST['reponse'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $prénom = htmlspecialchars($_POST['prénom']);
            $nomuser = htmlspecialchars($_POST['nomuser']);
            $mail = htmlspecialchars($_POST['mail']);
            $question = htmlspecialchars($_POST['question']);
            $reponse = htmlspecialchars($_POST['reponse']);
            
            if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
                die("l'adresse email est incorrecte");
            }
            // hasher mot de passe
            $mdp = password_hash($_POST['mdp'], PASSWORD_ARGONZID);
            $mdp2 = password_hash($_POST['mdp2'], PASSWORD_ARGONZID);

                if($_POST['mdp'] === $_POST['mdp2']) {
                        $insertmbr = $bdd->prepare ("INSERT INTO inscription(nom, prenom, nomuser,mail, motdepasse, motdepasse2,question,reponse) VALUES
                        (:nom, :prénom, :nomuser, :mail,'$mdp','$mdp2' :question, :reponse)");
                        $insertmbr->execute(array($nom, $prénom, $nomuser, $mail, $mdp, $mdp2, $question, $reponse)); 
                        $_SESSION['nom'] = $nom;
                        $_SESSION['prénom'] = $prénom;
                        $_SESSION['nomuser'] =$nomuser;
                        header('Location: accueil.php');
                    
                }
            else {
                echo "Vos mots de passes ne correspondent pas !";
            }
                    
                
        }
    }
?>


