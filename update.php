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

if(isset($_POST['update'])) {
    if(isset($_POST['newnom'])  AND !empty($_POST['newnom']) AND $_POST['newnom'] != $_SESSION['nom']) {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnewuser = $bdd->prepare("UPDATE inscription SET nom = ? WHERE id = ?");
        $insertnewuser->execute(array($newnom, $_SESSION['id']));       
    }
    if(isset($_POST['newprenom'])  AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $_SESSION['prénom']) {
        $newprenom = htmlspecialchars($_POST['newprenom']);
        $insertnewuser = $bdd->prepare("UPDATE inscription SET prenom = ? WHERE id = ?");
        $insertnewuser->execute(array($newprenom, $_SESSION['id']));       
    }
    
    if(isset($_POST['newnomuser'])  AND !empty($_POST['newnomuser']) AND $_POST['newnomuser'] != $_SESSION['nomuser']) {
        $newnomuser = htmlspecialchars($_POST['newnomuser']);
        $insertnewuser = $bdd->prepare("UPDATE inscription SET nomuser = ? WHERE id = ?");
        $insertnewuser->execute(array($newnomuser, $_SESSION['id']));       
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $_SESSION['mail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE inscription SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
    }    
                
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))  {
        $mdp = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);

        if($newmdp == $newmdp2) {
            $insertmdp = $bdd->prepare("UPDATE inscription SET motdepasse = ? WHERE id = ?");
            $insertmdp->execute(array($mdp, $_SESSION['id']));
            $insertmdp = $bdd->prepare("UPDATE inscription SET motdepasse2 = ? WHERE id = ?");
            $insertmdp->execute(array($mdp2, $_SESSION['id']));
        }        
    }            
}
header('Location:connexion.php');

?>



