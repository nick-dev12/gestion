<?php

require ('conn/conn.php');
// Vérifie si le formulaire a été soumis

// Définition des variables en tant que ensemble vide
$nom = $tell = $montant =$pin =$plan = $debut = $mail = $Netflix = $primevideo = $disney = $Crunchyroll = '';

if (isset($_POST['envoie'])) {
    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $tell = $_POST['full_phone'];
    $montant = $_POST['montant'];
    $pin =  $_POST['pin'];
   
    $plan = $_POST['plan'];

// Récupère la date d'inscription de l'utilisateur depuis le formulaire
$debut = $_POST['debut'];

// Crée un objet DateTime à partir de la chaîne de caractères entrée par l'utilisateur
$date_debut = DateTime::createFromFormat('Y-m-d', $debut);

if ($date_debut === false) {
    // Gérez l'erreur si la date de début n'est pas valide
    die('Date de début invalide.');
}

$date_expiration = clone $date_debut;

if ($plan === '1Mois') {
    // Ajoute 30 jours à la date d'inscription pour obtenir la date d'expiration
    $date_expiration->modify('+30 days');
} elseif ($plan === '3Mois') {
    // Ajoute 90 jours à la date d'inscription pour obtenir la date d'expiration
    $date_expiration->modify('+90 days');
} elseif ($plan === '12Mois') {
    // Ajoute 365 jours à la date d'inscription pour obtenir la date d'expiration
    $date_expiration->modify('+365 days');
} else {
    // Gérez l'erreur si le plan n'est pas valide
    die('Plan invalide.');
}


    $mail = $_POST['mail'];
    
    $pdo = "SELECT email FROM mail WHERE email = :mail";
    $stmt = $db->prepare($pdo);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result > 0){

    }else{
        $pdo = " INSERT INTO mail (email) VALUES (:mail)";
        $stmt = $db->prepare($pdo);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
    }

    if (isset($_POST['Netflix'])) {
        // Requête SQL pour compter le nombre de lignes avec la même adresse e-mail et Netflix = 'Netflix'
        $pdo_mail = "SELECT mail FROM users WHERE mail = :mail AND Netflix = 'Netflix' ";
        $stmt_mail = $db->prepare($pdo_mail);
        $stmt_mail->bindParam(':mail', $mail);
        $stmt_mail->execute();
        $mail_result = $stmt_mail->fetchAll(PDO::FETCH_ASSOC);
        $Nmail = count($mail_result);
        if ($Nmail > 4) {
            $erreurs = 'Vous avez atteint la limite de compte pour cette adresse e-mail';
        } else {
            $Netflix = $_POST['Netflix'];
        }
    } else {
        $Netflix = 'aucun';
    }
    

    
    if (isset($_POST['primevideo'])) {
         // Requête SQL pour compter le nombre de lignes avec la même adresse e-mail et Netflix = 'Netflix'
         $pdo_mail = "SELECT mail FROM users WHERE mail = :mail AND primevideo = 'primevideo' ";
         $stmt_mail = $db->prepare($pdo_mail);
         $stmt_mail->bindParam(':mail', $mail);
         $stmt_mail->execute();
         $mail_result = $stmt_mail->fetchAll(PDO::FETCH_ASSOC);
         $Nmail = count($mail_result);
         if ($Nmail > 4) {
             $erreurs = 'Vous avez atteint la limite de compte pour cette adresse e-mail';
         } else {
              $primevideo = $_POST['primevideo'];
         }
    } else {
        $primevideo = 'aucun';
    }

    if (isset($_POST['disney'])) {
         // Requête SQL pour compter le nombre de lignes avec la même adresse e-mail et Netflix = 'Netflix'
         $pdo_mail = "SELECT mail FROM users WHERE mail = :mail AND disney  = 'disney ' ";
         $stmt_mail = $db->prepare($pdo_mail);
         $stmt_mail->bindParam(':mail', $mail);
         $stmt_mail->execute();
         $mail_result = $stmt_mail->fetchAll(PDO::FETCH_ASSOC);
         $Nmail = count($mail_result);
         if ($Nmail > 4) {
             $erreurs = 'Vous avez atteint la limite de compte pour cette adresse e-mail';
         } else {
              $disney  = $_POST['disney'];
         }
    } else {
        $disney = 'aucun';
    }

    if (isset($_POST['Crunchyroll'])) {
          // Requête SQL pour compter le nombre de lignes avec la même adresse e-mail et Netflix = 'Netflix'
          $pdo_mail = "SELECT mail FROM users WHERE mail = :mail AND Crunchyroll  = 'Crunchyroll ' ";
          $stmt_mail = $db->prepare($pdo_mail);
          $stmt_mail->bindParam(':mail', $mail);
          $stmt_mail->execute();
          $mail_result = $stmt_mail->fetchAll(PDO::FETCH_ASSOC);
          $Nmail = count($mail_result);
          if ($Nmail > 4) {
              $erreurs = 'Vous avez atteint la limite de compte pour cette adresse e-mail';
          } else {
               $Crunchyroll  = $_POST['Crunchyroll'];
          }
    } else {
        $Crunchyroll = 'aucun';
    }

    if (empty($erreurs)) {
         // Prépare la requête d'insertion
    $sql = "INSERT INTO users (nom, telephone, montant, debut, fin, mail,plan ,pin , Netflix, primevideo, disney, Crunchyroll) VALUES (:nom, :telephone, :montant, :debut, :fin, :mail, :plan ,:pin , :Netflix, :primevideo, :disney, :Crunchyroll)";
    $stmt = $db->prepare($sql);

    // Liaison des valeurs
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':telephone', $tell);
    $stmt->bindParam(':montant', $montant);
    $stmt->bindParam(':debut',  $date_debut->format('Y-m-d'));
    $stmt->bindParam(':fin', $date_expiration->format('Y-m-d'));
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':pin', $pin);
    $stmt->bindParam(':plan', $plan);
    $stmt->bindParam(':Netflix', $Netflix);
    $stmt->bindParam(':primevideo', $primevideo);
    $stmt->bindParam(':disney', $disney);
    $stmt->bindParam(':Crunchyroll', $Crunchyroll);

    $stmt->execute();


      // Prépare la requête d'insertion
      $sauv = "INSERT INTO sauvegarde (nom, telephone, montant, debut, plan, fin, mail,pin , Netflix, primevideo, disney, Crunchyroll) VALUES (:nom, :telephone, :montant, :debut, :plan, :fin, :mail ,:pin , :Netflix, :primevideo, :disney, :Crunchyroll)";
      $sauvegarde = $db->prepare($sauv);
  
      // Liaison des valeurs
      $sauvegarde->bindParam(':nom', $nom);
      $sauvegarde->bindParam(':telephone', $tell);
      $sauvegarde->bindParam(':montant', $montant);
      $sauvegarde->bindParam(':debut',  $date_debut->format('Y-m-d'));
      $sauvegarde->bindParam(':fin', $date_expiration->format('Y-m-d'));
      $sauvegarde->bindParam(':mail', $mail);
      $sauvegarde->bindParam(':pin', $pin);
      $sauvegarde->bindParam(':plan', $plan);
      $sauvegarde->bindParam(':Netflix', $Netflix);
      $sauvegarde->bindParam(':primevideo', $primevideo);
      $sauvegarde->bindParam(':disney', $disney);
      $sauvegarde->bindParam(':Crunchyroll', $Crunchyroll);
  
      $sauvegarde->execute();

    // Redirection vers une page de confirmation ou autre
    header("Location: index.php");
    exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
</head>

<body>
    <div class="modal">
        <form class="form" method="post">
        <?php if(isset($erreurs)): ?>
                <h4><?= $erreurs ?></h4>
                <?php endif ;?>
            <div class="separator">
                <hr class="line">
                <p>Choisissez votre abonnement</p>
                <hr class="line">
            </div>
            <div class="payment--options">
                <div class="div choix ">
                    <input type="checkbox" name="Netflix" id="Netflix" value="Netflix">
                    <label class="v1" for="Netflix">
                        <img src="image/Netflix 2.png" alt="">
                    </label>

                </div>

                <div class="div choix">
                    <input type="checkbox" name="primevideo" id="primevideo" value="primevideo">
                    <label class="v2" for="primevideo">
                        <img src="image/prime video.png" alt="">
                    </label>

                </div>

                <div class="div choix">
                    <input type="checkbox" name="disney" id="disney" value="disney">
                    <label class="v3" for="disney">
                        <img src="image/disney +.png" alt="">
                    </label>

                </div>

                <div class="div choix">
                    <input type="checkbox" name="Crunchyroll" id="Crunchyroll" value="Crunchyroll">
                    <label class="v4" for="Crunchyroll">
                        <img src="image/Crunchyroll 2.png" alt="">
                    </label>

                </div>

                <script>
                    let choix1 =document.querySelector('.v1')
                    let choix2 =document.querySelector('.v2')
                    let choix3 =document.querySelector('.v3')
                    let choix4 =document.querySelector('.v4')

                    choix1.addEventListener('click', ()=>{
                        choix1.classList.add('v0')
                        choix2.classList.remove('v0')
                        choix3.classList.remove('v0')
                        choix4.classList.remove('v0')
                    })

                    choix2.addEventListener('click', ()=>{
                        choix2.classList.add('v0')
                        choix1.classList.remove('v0')
                        choix3.classList.remove('v0')
                        choix4.classList.remove('v0')
                    })

                    choix3.addEventListener('click', ()=>{
                        choix3.classList.add('v0')
                        choix2.classList.remove('v0')
                        choix1.classList.remove('v0')
                        choix4.classList.remove('v0')
                    })

                    choix4.addEventListener('click', ()=>{
                        choix4.classList.add('v0')
                        choix2.classList.remove('v0')
                        choix3.classList.remove('v0')
                        choix1.classList.remove('v0')
                    })
                </script>
            </div>

            <div class="plan-options">
                <label class="plan-option option">
                    <input type="radio" id="ttt" name="plan" value="1Mois" onclick="updateAmount()" required> 1Mois
                </label>
                <label class="plan-option option2">
                    <input type="radio" id="ttt" name="plan" value="3Mois" onclick="updateAmount()">3Mois
                </label>
                <label class="plan-option option3">
                    <input type="radio" id="ttt" name="plan" value="12Mois" onclick="updateAmount()"> 12Mois
                </label>

                <script>
                   let plan1 = document.querySelector('.option')
                   let plan2 = document.querySelector('.option2')
                   let plan3 = document.querySelector('.option3')

                   plan2.addEventListener('click', ()=>{
                    plan2.classList.add('option1')
                    plan1.classList.remove('option1')
                    plan3.classList.remove('option1')
                   })

                   plan1.addEventListener('click', ()=>{
                    plan1.classList.add('option1')
                    plan2.classList.remove('option1')
                    plan3.classList.remove('option1')
                   })

                   plan3.addEventListener('click', ()=>{
                    plan3.classList.add('option1')
                    plan1.classList.remove('option1')
                    plan2.classList.remove('option1')
                   })
                </script>
            </div>
            <div class="separator">
                <hr class="line">
                <p>Enregistre tes informations</p>
                <hr class="line">
            </div>
            <div class="credit-card-info--form">
                <div class="input_container">
                    <label for="password_field" class="input_label">Nom et Prenom</label>
                    <input id="password_field" class="input_field" type="text" name="nom" placeholder="EX: salimata">
                </div>
                <div class="input_container">
                    <label for="phone" class="input_label">Numero de telephone</label>
                    <input id="phone" class="input_field" type="number" name="tell">
                    <input type="hidden" id="full_phone" name="full_phone">
                </div>
                <div class="input_container">
                    <label for="password_field" class="input_label">Montant</label>
                    <input id="password_field" class="input_field" type="number" name="montant" placeholder="EX: 5000">
                </div>
                <div class="input_container">
                    <label for="password_field" class="input_label">Debut</label>
                    <input id="password_field" class="input_field" type="date" name="debut" placeholder="EX: 5000">
                </div>
                <div class="input_container">
                    <label for="password_field" class="input_label">Adress Mail</label>
                    <div class="split">
                        <input id="password_field" class="input_field" type="text" name="mail" title="Expiry Date"
                            placeholder="Exemple@gmail.com">

                    </div>
                </div>

                <div class="input_container">
                    <label for="password_field" class="input_label">Code Pin</label>
                    <div class="split">
                        <input id="password_field" class="input_field" type="text" name="pin" title="Expiry Date"
                            placeholder="EX : 0000">

                    </div>
                </div>
            </div>
            <button type="submit" name="envoie" class="purchase--btn">Enregistrer</button>
        </form>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    function updateAmount() {
        const plan = document.querySelector('input[name="plan"]:checked').value;
        const amount = plan * 3000;
        document.getElementById('amount').innerText = `Montant total: ${amount} Francs`;
    }

    // Ajoutez des écouteurs d'événements pour les changements de plan
    document.querySelectorAll('input[name="plan"]').forEach(plan => {
        plan.addEventListener('change', updateAmount);
    });

    const phoneInputField = document.querySelector("#phone");
    const fullPhoneInput = document.querySelector("#full_phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        preferredCountries: ["fr", "us", "gb"],
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then(function (res) {
                    return res.json();
                })
                .then(function (data) {
                    callback(data.country_code);
                })
                .catch(function () {
                    callback("us");
                });
        }
    });

    phoneInputField.addEventListener("blur", function() {
        fullPhoneInput.value = phoneInput.getNumber();
    });
</script>

</body>

</html>