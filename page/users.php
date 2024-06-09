<?php
session_start();
if(empty($_SESSION['admin'])){
    header('Location: connexion.php');
}
require ('../conn/conn.php');
// Vérifie si le formulaire a été soumis


if(isset($_GET['id'])){
    
    $sql = "SELECT * FROM users WHERE id = :id ";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$users = $stmt->fetch(PDO::FETCH_ASSOC);

// Définition des variables en tant que ensemble vide

if (isset($_POST['envoie'])) {
    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $tell = $_POST['tell'];
    $montant = $_POST['montant'];
    $pin = $_POST['pin'];

    $mail = $_POST['mail'];
    
    $pdo_mail = "SELECT email FROM mail WHERE email = :mail";
    $stmt_mail = $db->prepare($pdo_mail);
    $stmt_mail->bindParam(':mail', $mail);
    $stmt_mail->execute();
    $result = $stmt_mail->fetch(PDO::FETCH_ASSOC);

    if($result > 0){

    }else{
        $pdo = " INSERT INTO mail (email) VALUES (:mail)";
        $stmt = $db->prepare($pdo);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
    }

    // Prépare la requête d'insertion
    $sql_update = "UPDATE users SET nom = :nom, telephone = :telephone, montant = :montant, mail = :mail, pin = :pin WHERE id = :id";
    $stmt_update = $db->prepare($sql_update);

    // Liaison des valeurs
    $stmt_update->bindParam(':nom', $nom);
    $stmt_update->bindParam(':telephone', $tell);
    $stmt_update->bindParam(':montant', $montant);
    $stmt_update->bindParam(':mail', $mail);
    $stmt_update->bindParam(':pin', $pin);
    $stmt_update->bindParam(':id', $_GET['id']); // Vous devez également lier l'ID de l'utilisateur pour la clause WHERE

    $stmt_update->execute();


    // Redirection vers une page de confirmation ou autre
    header("Location:modifier.php");
    exit();
}



if (isset($_POST['envoier'])) {
   
      // Récupère la date d'inscription de l'utilisateur depuis le formulaire
$debut = $_POST['debut'];

// Crée un objet DateTime à partir de la chaîne de caractères entrée par l'utilisateur
$date_debut = DateTime::createFromFormat('Y-m-d', $debut);

// Ajoute 30 jours à la date d'inscription pour obtenir la date d'expiration
$date_expiration = clone $date_debut;
$date_expiration->modify('+30 days');

    // Prépare la requête d'insertion
    $sql_update = "UPDATE users SET debut = :debut, fin = :fin  WHERE id = :id";
    $stmt_update = $db->prepare($sql_update);
    $stmt_update->bindParam(':debut',  $date_debut->format('Y-m-d'));
    $stmt_update->bindParam(':fin', $date_expiration->format('Y-m-d'));
    $stmt_update->bindParam(':id', $_GET['id']); // Vous devez également lier l'ID de l'utilisateur pour la clause WHERE

    $stmt_update->execute();


    // Redirection vers une page de confirmation ou autre
    header("Location:modifier.php");
    exit();
}

}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="/inscription.css">
</head>

<body>
    <div class="modal">
        <form class="form" method="post">
            <div class="separator">
                <hr class="line">
                <p>Modification</p>
                <hr class="line">
            </div>
           
            <div class="separator">
                <hr class="line">
                <p>Enregistre tes informations</p>
                <hr class="line">
            </div>
            <div class="credit-card-info--form">
                <div class="input_container">
                    <label for="password_field" class="input_label">Nom et Prenom</label>
                    <input id="password_field" class="input_field" type="text" value="<?= $users['nom']?>" name="nom" placeholder="EX: salimata">
                </div>
                <div class="input_container">
                    <label for="password_field" class="input_label">Numero de telephone</label>
                    <input id="password_field" class="input_field" value="<?= $users['telephone']?>" type="text" name="tell"
                        placeholder="0000 0000 0000 0000">
                </div>
                <div class="input_container">
                    <label for="password_field" class="input_label">Montant</label>
                    <input id="password_field" class="input_field" value="<?= $users['montant']?>" type="number" name="montant" placeholder="EX: 5000">
                </div>

                <div class="input_container">
                    <label for="password_field" class="input_label">Code Pin</label>
                    <input id="password_field" class="input_field" value="<?= $users['pin']?>" type="number" name="pin" placeholder="EX: 0000">
                </div>
                <div class="input_container">
                    <label for="password_field" class="input_label">Adress Mail</label>
                    <div class="split">
                        <input id="password_field" class="input_field" value="<?= $users['mail']?>" type="text" name="mail" title="Expiry Date"
                            placeholder="Exemple@gmail.com">

                    </div>
                </div>
            </div>
            <button type="submit" name="envoie" class="purchase--btn">Enregistrer</button>
        </form>


        <form class="form" method="post">
            <div class="separator">
                <hr class="line">
                <p>Voulez vous modifier cette date ? </p>
                <hr class="line">
            </div>
                <div class="input_container">
                    <label for="password_field" class="input_label">Debut</label>
                    <div class="split">
                        <input id="password_field" class="input_field" value="<?= $users['debut']?>" type="date" name="debut" title="Expiry Date" >
                    </div>
                    <button type="submit" name="envoier" class="purchase--btn">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>