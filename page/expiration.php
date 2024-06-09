<?php
session_start();
if(empty($_SESSION['admin'])){
    header('Location: ../connexion.php');
}

require ('../conn/conn.php');
require_once ('../vendor/autoload.php'); // if you use Composer

$sql = "SELECT * FROM users ";
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['avertir'])){
    foreach ($users as $user) {
        if ($user['statut'] === 'expirer') {
            $N_telephone = $user['telephone'];
            
            $ultramsg_token = "wlclenqf1qpeoy5c"; // Ultramsg.com token
            $instance_id = "instance87257"; // Ultramsg.com instance id
            $client = new UltraMsg\WhatsAppApi($ultramsg_token, $instance_id);
            $to = $N_telephone;
            $body = "Votre abonnement a expirer veuiller nous contacter pour proceder au renouvellement merci !";
            $api = $client->sendChatMessage($to, $body);
            // print_r($api); 

            header('Location: expiration.php');
            exit();
        }
    }
}

 // Vérifiez que l'identifiant de l'utilisateur est présent dans l'URL
 if (isset($_GET['renouveler'])) {
    $id = $_GET['renouveler'];
    $statut = 'a jour';

    // Récupérez la date actuelle
    $now = new DateTime();

    // Récupérez la date d'expiration actuelle depuis la base de données
    $sql = "SELECT fin FROM users WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $current_expiration = $stmt->fetchColumn();

    if ($current_expiration) {
        $current_expiration_date = new DateTime($current_expiration);
    } else {
        // Si aucune date d'expiration n'est trouvée, utilisez la date actuelle
        $current_expiration_date = $now;
    }

    // Déterminer la nouvelle date d'expiration
    $interval = new DateInterval('P30D');
    if ($current_expiration_date > $now) {
        // Si l'abonnement est encore valide, ajoutez 30 jours à la date d'expiration actuelle
        $new_expiration = clone $current_expiration_date;
    } else {
        // Sinon, ajoutez 30 jours à la date actuelle
        $new_expiration = clone $now;
    }
    $new_expiration->add($interval);

    // Mettez à jour la date d'expiration et le statut de l'abonnement dans la base de données
    $sql = "UPDATE users SET fin = :fin, statut = :statut WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':fin', $new_expiration->format('Y-m-d'));
    $stmt->bindParam(':statut', $statut);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sauv = "UPDATE sauvegarde SET fin = :fin, statut = :statut WHERE id = :id";
    $sauvegarde = $db->prepare($sauv);
    $sauvegarde->bindParam(':fin', $new_expiration->format('Y-m-d'));
    $sauvegarde->bindParam(':statut', $statut);
    $sauvegarde->bindParam(':id', $id);
    $sauvegarde->execute();

    // Redirection vers une page de confirmation ou autre
    header('Location: expiration.php');
    exit();
}


if(isset($_POST['recherche'])) {
    // Assurez-vous que le champ de recherche n'est pas vide
    if(!empty($_POST['valeur'])) {
        $recherche = $_POST['valeur'];

        // Requête SQL pour rechercher dans la base de données en fonction des critères
        $sql = "SELECT * FROM users WHERE 1=1";
        if (!empty($recherche)) {
            $sql .= " AND (nom LIKE :recherche)";
        }
        $stmt = $db->prepare($sql);
        if (!empty($recherche)) {
            $stmt->bindValue(':recherche', "%$recherche%", PDO::PARAM_STR);
        }
        $stmt->execute();

        $resulte = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Stocker les résultats de la recherche dans une session
        $_SESSION['resultats'] = $resulte;

        header('Location: ../page/search_renew.php');
        exit();
    } else {
        // Champ de recherche vide, afficher un message d'erreur
        $erreurs = 'Le champ de recherche ne doit pas être vide !';
    }
}


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5JBWCPV7');
    </script>

    <title>Expiration</title>
    <link rel="icon" href="../image/logo.png" type="image/x-icon">

    <script src="../script/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="/css/expiration.css">
    <link rel="stylesheet" href="../navbare.css">

    <link rel="stylesheet" href="../css/aos.css" />
    <script src="../js/aos.js"></script>

    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JBWCPV7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <?php include ('../navbare.php') ?>

    <?php include('../include/header_users.php') ?>

    <section class="section3">

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="message">
                <p>
                    <span></span>
                    <?php echo $_SESSION['success_message']; ?>
                    <?php unset($_SESSION['success_message']); ?>
                </p>
            </div>
        <?php else: ?>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="erreurs" id="messageErreur">
                    <span></span>
                    <?php echo $_SESSION['error_message']; ?>
                    <?php unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <script>
            let success = document.querySelector('.message')
            setTimeout(() => {
                success.classList.add('visible');
            }, 200);
            setTimeout(() => {
                success.classList.remove('visible');
            }, 6000);

            // Sélectionnez l'élément contenant le message d'erreur
            var messageErreur = document.getElementById('messageErreur');

            // Fonction pour afficher le message avec une transition de fondu
            setTimeout(function () {
                messageErreur.classList.add('visible');
            }, 200); // 1000 millisecondes équivalent à 1 seconde

            // Fonction pour masquer le message avec une transition de fondu
            setTimeout(function () {
                messageErreur.classList.remove('visible');
            }, 6000); // 6000 millisecondes équivalent à 6 secondes
        </script>

<form method="post" action="">
<div class="search-bar">
         <input type="search" name="valeur" id="search-input" placeholder="Rechercher...">
        <button type="submit" name="recherche" id="search-button"><img src="/image/recherche.png" alt=""></button>
      </div>
    </form>
<div class="boxh">
    <h2>Compte expirer <a href="?avertir">Avertir <img src="../image/whats.png" alt=""></a></h2>
</div>

       


        <div class="container"> 
            
            <?php foreach ($users as $user): ?>
                <?php if($user['statut'] === 'expirer'): ?> 
            <?php
                            $sql = " SELECT fin FROM users WHERE id = :id";
                            $stmt = $db->prepare($sql);
                            $stmt->bindParam(':id', $user['id']);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                            $date_expiration = DateTime::createFromFormat('Y-m-d', $result['fin']);
    
                            $new = new DateTime();
                            $diff = $date_expiration->diff($new);
    
                            if ($diff->days <= 5){
                                $statut = '-5jours';
                                 // Mets à jour le statut du compte
                                 $stmt = $db->prepare('UPDATE users SET statut = :statut WHERE id = :id');
                                 $stmt->bindParam(':statut', $statut);
                                 $stmt->bindParam(':id', $user['id']);
                                 $stmt->execute();
                            }
    
                            if ($new > $date_expiration) {
                                $statut = 'expirer';
                                // Mets à jour le statut du compte
                                $stmt = $db->prepare('UPDATE users SET statut = :statut WHERE id = :id');
                                $stmt->bindParam(':statut', $statut);
                                $stmt->bindParam(':id', $user['id']);
                                $stmt->execute();
                            }
                            ?>
            <?php if($user['statut'] === 'a jour'): ?>                
            <div class="box comm">
                <?php else :?>
            <?php if($user['statut'] === '-5jours'): ?> 
            <div class="box01 comm"> 
            <?php else :?>
                <?php if($user['statut'] === 'expirer'): ?> 
            <div class="box02 comm">
            <?php else :?>
                <?php if($user['statut'] === ''): ?>
                    <div class="box">
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
    
                <a href="https://api.whatsapp.com/send?phone=<?= $user['telephone'] ?>" target="_blank"> <img src="/image/whats.png" alt="" id="supp"></a>
                <a href="?renouveler=<?= $user['id'] ?>"><img src="/image/renou.png" alt="" id="rest"></a>
            <div>
              <img class="img" src="/image/profile.png" alt="">
              <h3><?= $user['nom'] ?> </h3>
              </div>
              <ul>
                                    <?php ?>
                                    <?php if ($user['Netflix'] === 'Netflix'): ?>
                                        <li><img src="/image/Netflix 2.png" alt="" </li>
                                        <?php endif; ?>
                                        <?php if ($user['primevideo'] === 'primevideo'): ?>
                                        <li><img src="/image/prime video.png" alt=""></li>
                                    <?php endif; ?>
                                    <?php if ($user['disney'] === 'disney'): ?>
                                        <li><img src="/image/disneyp.avif" alt=""></li>
                                    <?php endif; ?>
                                    <?php if ($user['Crunchyroll'] === 'Crunchyroll'): ?>
                                        <li><img src="/image/Crunchyroll.png" alt=""></li>
                                    <?php endif; ?>
                                </ul>
                <p class="pin"><strong>Phone :</strong><?= $user['telephone'] ?></p>
                <p class="pin"><strong>PIN :</strong> <?= $user['pin']?></p>
                <p class="mail"> <strong>Mail : </strong><?= $user['mail'] ?></p>
    
                <h4><?= $user['plan'] ?> : <?= $user['montant'] ?> , <?= $user['fin'] ?></h4>
            </div>
            <?php endif; ?>
            <?php endforeach ?>
    
           
    
          </div>


    </section>
   

</body>

</html>