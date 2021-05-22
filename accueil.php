<?php
include ('db.php'); 


?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8" />
        <title>Accueil</title>
      <link rel ="stylesheet" href="style.css">
    </head>
          
        <body>
            
            <header class = "infos">
                <img src="logo.jpg"  id = "logo" alt="page-logo">
                <nav><!-- Nom et prenom de utilisateur-->
                <a href="profil.php" style="color:#fff"><i class="fas fa-user-circle"></i></a>
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
<section id = "présentation">
    <h1>GBAF </h1>
        <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
            <ul>
                <li>BNP Paribas </li>
                <li> BPCE </li>
                <li>Crédit Agricole </li>
                <li>Crédit Mutuel-CIC </li>
                <li> Société Générale </li>
                <li> La Banque Postale</li>
            </ul>
        <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française.
            Sa mission est de promouvoir l'activité bancaire à l’échelle nationale.C’est aussi un interlocuteur privilégié des pouvoirs publics.<br>
            Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler  de la même façon pour gérer près de 80 millions de comptes 
            sur le territoire  national.
        </p>
</section>
<hr>
<section id =  "acteurs">
    <div id="acteur_list">
        <h2>Section acteurs</h2>
            <ul>
                <li>BNP Paribas</li>
                <li>BPCE</li>
                <li>Crédit Agricole</li>
                <li>Crédit Mutuel-CIC</li>
                <li>Société Générale</li>
                <li>La Banque Postale</li>
            </ul>
        </div>
    <div id="acteur_list2">
        <h2>Nos acteurs</h2>
            <ul>
                <li>Formation & co</li>
                <li>Protectpeople</li>
                <li>DSA France</li>
                <li>CDE</li>
            </ul>
        </div>
</section>
<article>

<section class="section">
                    <img src = "formation_co.png" class="logo1" alt = "logo_acteur1"/>
        <div id ="text_acteur">
            <h3>FORMATION & CO</h3>
                <p>Formation&co est une association française présente sur tout le territoire.
               Nous proposons à des personnes issues de tout milieu de devenir.......</p>
                </div>
                    <a href= "acteur.php?acteurid=1"> <button type="submit" class="btn_commen">Lire la suit</button></a>

</section>

 <section class="section">
                    <img src="protectpeople.png" class="logo1" atl="logo_acteur2"/>
        <div id="text_acteur2">
            <h3>PROTECTPEOPLE</h3>
                <p>Protectpeople finance la solidarité nationale.
               Nous appliquons le principe édifié par la Sécurité sociale française en 1945...</p>
        </div> 
            
                    <a href= "acteur.php?acteurid=2"> <button type="submit" class="btn_commen">Lire la suit</button></a>
</section>

<section class="section">
                    <img src="Dsa_france.png" class="logo1" alt="logo_acteur3"/>
        <div id="text_acteur3">
            <h3>DSA_FRANCE</h3>
                <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                Nous accompagnons les entreprises dans les étapes clés de leur évolution.....</p>
        </div>
            
                    <a href= "acteur.php?acteurid=3"> <button type="submit" class="btn_commen">Lire la suit</button></a>
</section>

<section class="section">
                    <img src="CDE.png" class="logo1" alt="logo_acteur4"/>
        <div id="text_acteur4">
            <h3>CDE</h3>
                <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation.
                Son président est élu pour 3 ans par ses pairs....</p>
        </div>

                    <a href= "acteur.php?acteurid=4"> <button type="submit" class="btn_commen">Lire la suit</button></a>
</section>

</article>
    </body>

<footer>
        <p>Copyright</p>
</footer>
</html>