<?php

session_start();

require ('../conn/conn.php');
// Vérifie si le formulaire a été soumis

if(isset($_POST['envoie'])) {

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    // Hasher le mot de passe
    $mot_de_passe_hache = password_hash($pass, PASSWORD_DEFAULT);

    // Requête SQL d'insertion des données
    $requete = "INSERT INTO admins (mail, pass) VALUES (:mail, :pass)";
    
    try {
        // Préparation de la requête
        $statement = $db->prepare($requete);
        
        // Liaison des paramètres
        $statement->bindParam(':mail', $mail);
        $statement->bindParam(':pass', $mot_de_passe_hache);
        
        // Exécution de la requête
        $statement->execute();
        
         // Redirection vers une page de confirmation ou autre
    header("Location: ../index.php");
    exit();
        
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="/inscription.css">
</head>

<body>
    <div class="modal">
        <form class="form" method="post">
        <?php if(isset($erreurs)): ?>
                <h4><?= $erreurs ?></h4>
                <?php endif ;?>
            <div class="separator">
                <hr class="line">
                <p>Es tu Administrateur ?</p>
                <hr class="line">
            </div>

            <div class="separator">
                <hr class="line">
                <p>Enregistre tes informations</p>
                <hr class="line">
            </div>
            <div class="credit-card-info--form">
                
                <div class="input_container">
                    <label for="password_field" class="input_label">Adress Mail</label>
                    <div class="split">
                        <input id="password_field" class="input_field" type="text" name="mail" title="Expiry Date"
                            placeholder="Exemple@gmail.com">

                    </div>
                </div>

                <div class="input_container">
                    <label for="password_field" class="input_label">Mot de passe</label>
                    <div class="split">
                        <input id="password_field" class="input_field" type="password" name="pass" title="Expiry Date"
                            placeholder="EX : *******">

                    </div>
                </div>
                
            </div>
            <button type="submit" name="envoie" class="purchase--btn">Enregistrer</button>
        </form>
    </div>
</body>

</html>