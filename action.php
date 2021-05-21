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
if(isset($_GET['type'],/*$_GET['id'],*/$_GET['acteurid']) AND !empty($_GET['type']) /*AND !empty($_GET['id'])*/ AND !empty($_GET['acteurid'])) {
    $type = $_GET['type'];
    $acteurid = $_GET['acteurid'];
    $userId = $_SESSION['id'];
    $check = $bdd->prepare('SELECT id FROM acteurs where id = ?');
    $check->execute(array($_GET['acteurid']));

    if($check->rowCount()== 1) {
        if($type == 1 ) {
            $check_like = $bdd->prepare('SELECT id FROM likes WHERE acteurid = ? AND userId = ?');// if like exist
            $check_like->execute(array($acteurid,$userId));
            $deldislike = $bdd->prepare('DELETE FROM dislikes WHERE acteurid = ? AND userId = ?');// si like del from dislike
            $deldislike->execute(array($acteurid,$userId));
            if($check_like->rowCount() == 1) {
                $dellike = $bdd->prepare('DELETE FROM likes WHERE acteurid = ? AND userId = ?');//delete like
                $dellike->execute(array($acteurid,$userId));
            } else {
                $checklike = $bdd->prepare("INSERT INTO likes (acteurid,userId) VALUE (?,?)" );//Add like
                $checklike->execute(array($acteurid,$userId));
            }
        }else if($type == 2 ) {
            $check_dislike = $bdd->prepare('SELECT id FROM dislikes WHERE acteurid = ? AND userId = ?');//if dislike exist
            $check_dislike->execute(array($acteurid,$userId));
            $dellike = $bdd->prepare('DELETE FROM likes WHERE acteurid = ? AND userId = ?');//si disliked del from like
            $dellike->execute(array($acteurid,$userId));
            if($check_dislike->rowCount() == 1) {
                $deldislike = $bdd->prepare('DELETE FROM dislikes WHERE acteurid = ? AND userId = ?');//delete dislike
                $deldislike->execute(array($acteurid,$userId));
        } else {
        $reqdislike = $bdd->prepare("INSERT INTO dislikes(acteurid,userId) VALUE (?,?)" );//Add like
        $reqdislike->execute(array($acteurid,$userId));
            }
        }
        header('Location:http://test.test/acteur.php?acteurid='.$acteurid);
    }    
}   

