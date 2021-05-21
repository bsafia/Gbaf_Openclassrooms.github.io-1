<?php include ('db1.php'); ?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inscription</title>
            <link rel ="stylesheet" href="style1.css">
        </head> 
       <div class="img_logo">
        <img src="logo.jpg"  id="logo_inscription" alt="page-logo">
       </div>     
        <body>
            <div class="container"><!-- diplay erreur--> 
                <div class="title">Inscription</div>                 
                    <form  method="POST" action="db.php">
                        <div class="user_details">
                            <div class="input_box">
                                <span class="details">Nom</span>
                                    <input type="text" id="nom" name="nom"   class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Prénom</span>
                                    <input type="text"  name="prénom"  class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Nom utilisateur</span>
                                    <input type="text"  name="nomuser"  class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">E-mail</span>
                                    <input type="email"  name="mail"  class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Mot de passe</span>
                                    <input type="password"  name="mdp" class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Confirmer mot de passe</span>
                                    <input type="password"  name="mdp2" class="form_input" required />
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
                                <input type="submit" name="forminscription" value="Envoyez">
                            </div>
                        </div>
                        <div style="text-align:right">
                                    <a style='color:red' href="connexion.php">J'ai deja un compte</a>
                            </div>
                    </form>
                      
                </div>
            </div>
        </body>
</html>                