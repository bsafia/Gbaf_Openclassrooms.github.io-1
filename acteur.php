<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=test.test;dbname=gbaf;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
if(isset($_GET['acteurid']) AND !empty($_GET['acteurid'])) {

        $acteurid=$_GET["acteurid"];
        $reqact = $bdd->prepare ("SELECT * from acteurs WHERE id=?");
        $reqact->execute(array($acteurid));
        $acteur = $reqact->fetch();

    if (isset($_POST['commentSubmit'])) {
        
        if(isset($_POST['message']) && !empty($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']);

            $ins = $bdd->prepare('INSERT INTO comments (userId, messages, acteurid, datecomment) VALUES (?,?,?,NOW())');
            $ins->execute(array($_SESSION['id'],$message,$acteurid));
        }
    }  
}   
$likes = $bdd->prepare('SELECT id FROM likes WHERE acteurid = ?');
$likes->execute(array($acteurid));
$likes = $likes->rowCount();
$dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE acteurid = ?');
$dislikes->execute(array($acteurid));
$dislikes = $dislikes->rowCount();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <meta charset="utf-8" />
        <title><?php echo $acteur["nom"]; ?></title>
        <link rel ="stylesheet" href="style.css">
    </head> 
<body>
    <header class = "infos">
        <img src="logo.jpg"  id = "logo" alt="page-logo">
        <nav>
        <a href="accueil.php" style="color:#fff"><i class="fas fa-long-arrow-alt-left"></i></a>
            <?php if(isset($_SESSION['nom'])): ?>
                <h4><?php echo $_SESSION['nom'] ?>
                <?php endif ?>
                <?php if(isset($_SESSION['prénom'])): ?>
                <?php echo $_SESSION['prénom'] ?></h4>
                <?php endif ?>
                <a href="connexion.php" style="color:#fff" ><i class="fas fa-sign-out-alt"></i></a>
        </nav>
</header>
<hr>
<section>
    
    <img src="<?php echo $acteur["image"]; ?>" id="formation_logo" alt="logo"/>
    <!--<a href="accueil.php" style="color:#fff"><i class="fas fa-undo-alt"></i></a>-->
        <h2><?php echo $acteur["nom"]; ?></h2>
    <hr>
    <div class = "formation_text">
        <?php echo $acteur["text"]; ?>
    </div> 

</section>
<section><!--like dislike System -->
    <div class="nov_comm">
        <a href= "#click"> <input type="button" value="Nouveau Commentaire" ></a>
        <a class="like" href="action.php?type=1&acteurid=<?php echo $acteurid ?>"><i class="fas fa-thumbs-up"></i><?= $likes ?></a>
        <a class="like" href="action.php?type=2&acteurid=<?php echo $acteurid ?>"><i class="fas fa-thumbs-down"></i><?= $dislikes ?></a>
    </div>
    <div class="phpcomment">
    <h3>Commentaire Poster</h3>
            
            <?php
            try
            {
                $bdd = new PDO('mysql:host=test.test;dbname=gbaf;charset=utf8', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            $reqcom = $bdd->prepare('SELECT * FROM comments WHERE acteurid = ? ORDER BY id DESC');
            $reqcom->execute(array($acteurid)); 
            while($reponse = $reqcom->fetch(PDO::FETCH_OBJ)) {
                $requser = $bdd->prepare('SELECT nom, prenom FROM inscription WHERE id = ? ');
                $requser->execute(array($reponse->userId));
                $commentuser=$requser->fetch(PDO::FETCH_OBJ);                
            ?>
                <article> 
                <div class="comment_header">
                <?php if(isset($commentuser->nom)): ?>
                <h4><?php echo $commentuser->nom ?>
                <?php endif ?>
                <?php if(isset($commentuser->prenom)): ?>
                <?php echo $commentuser->prenom ?></h4>
                <?php endif ?>
                <?php echo $reponse->datecomment; ?>
                </div>
                <div class="msgphp">
                <p>
                <?php echo $reponse->messages; ?>
                </p>
                </div>
                </article>
            <?php
            }
            ?>
            <form method='post' action=''>
                    <div class='esp_cmnt'>
                    <input type='hidden' name='nom' value='nom'>
                    </div>
                    <div class='esp_cmnt'><br><br>
                    <textarea name='message' rows='10' cols='100' class='comment'></textarea>
                    <input type='submit' id="click" name='commentSubmit' value='Poster' >
                </div> 
                    
            </form>
        </div>
</section>
<section>
        <footer>
            <p>Copyright</p>
        </footer>
</section>
</body>
</html>


