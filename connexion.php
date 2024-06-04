<?php

session_start();

require ('conn/conn.php');
// Vérifie si le formulaire a été soumis


if(isset($_POST['envoie'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    // Requête SQL pour vérifier l'existence de l'utilisateur
    $sql = "SELECT * FROM admins WHERE mail = :mail";
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $erreurs = "Email incorrect";
    } else {
        if (empty($pass)) {
            $erreurs = "Mot de passe requis";
        } elseif (!password_verify($pass, $user['pass'])) {
            $erreurs = "Mot de passe incorrect";
        } else {
            // Authentification réussie
            $_SESSION['admin'] = $user['id'];
            header('location: index.php');
            exit();
        }
    }
}
?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
                <p>Connecte toi</p>
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