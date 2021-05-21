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
    
    if (isset($_POST['commentSubmit'])) {
        if(!empty($_POST['nom']) && !empty($_POST['message'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $message = htmlspecialchars($_POST['message']);
            $req = $bdd->prepare ("INSERT INTO comments(nom, messages) VALUES(?,?)");
            $req->execute(array($nom, $message));
        }
    }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <meta charset="utf-8" />
        <title>Formation_co</title>
      <link rel ="stylesheet" href="style.css">
    </head> 
<body>
    <header class = "infos">
        <img src="logo.jpg"  id = "logo" alt="page-logo">
        <nav>
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
    
    <img src="formation_co.png" id="formation_logo" alt="logo"/>
    <!--<a href="accueil.php" style="color:#fff"><i class="fas fa-undo-alt"></i></a>-->
        <h2>FORMATION & CO</h2>
    <hr>
    <div class = "formation_text">
        <p>Formation&co est une association française présente sur tout le territoire.
        Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.
        Notre proposition :</p>
            <ul>
                <li>un financement jusqu’à 30 000€ </li>
                 <li>un suivi personnalisé et gratuit </li>
                 <li>une lutte acharnée contre les freins sociétaux et les stéréotypes</li>
             </ul>
         <p>Le financement est possible, peu importe le métier: coiffeur, banquier, éleveur de chèvres.....<br>
      Nous collaborons avec des personnes talentueuses et motivées.<br>
      Vous n'avez pas de diplôme? Ce n'est pas un probléme pour nous!<br>
      Nos financements s'adressent à tous. 
         </p>
    </div>
</section>
<section>
    <div class="nov_comm">
        <input type="button" value="Nouveau Commentaire" >
        <i class="fas fa-thumbs-up"></i>
        <i class="fas fa-thumbs-down"></i>
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
                $req = $bdd->prepare('SELECT * FROM  comments');
                $req->execute();
                while($reponse = $req->fetch(PDO::FETCH_OBJ)) {
                
                ?>
                <article> 
                <div class="comment_header">
                <?php if(isset($_SESSION['nom'])): ?>
                <h4><?php echo $_SESSION['nom'] ?>
                <?php endif ?>
                <?php if(isset($_SESSION['prénom'])): ?>
                <?php echo $_SESSION['prénom'] ?></h4>
                <?php endif ?>
                <label><?php date_default_timezone_set('Europe/paris');
                echo date('d/m/Y h:i:s'); ?></label>
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
                    <input type='submit' name='commentSubmit' value='Poster' >
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


