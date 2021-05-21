<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mot de passe oublie</title>
            <link rel ="stylesheet" href="style1.css">
        </head> 
       <div class="img_logo">
        <img src="logo.jpg"  id="logo_inscription" alt="page-logo">
       </div>     
        <body>
            <div class="container"><!-- diplay erreur--> 
                <div class="title">Reset mot de passe</div>                 
                    <form  method="POST" action="passe.php">
                        <div class="user_details">
                            <div class="input_box">
                                <span class="details">Nom utilisateur</span>
                                    <input type="text"  name="nomuser" placeholder="Username" class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Nouveau mot de passe</span>
                                    <input type="password"  name="mdp" placeholder ="Nouveau mot de passe" class="form_input" required />
                            </div>
                            <div class="input_box">
                                <span class="details">Confirmer mot de passe</span>
                                    <input type="password"  name="mdp2" placeholder ="Confirmer mot de passe" class="form_input" required />
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
                                <input type="submit" name="forgetpw" value="Envoyez">
                            </div>
                        </div>
                        <div style="text-align:right">
                                    <a style='color:red' href="connexion.php">Connexion</a>
                            </div>
                    </form>