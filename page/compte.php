<?php
session_start();
if(empty($_SESSION['admin'])){
    header('Location: connexion.php');
}

require ('../conn/conn.php');
$sql = "SELECT email FROM mail ";
$stmt = $db->prepare($sql);
$stmt->execute();
$Mail = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = count($Mail);


// Afficher les comptes dans des tableaux groupés par adresse e-mail
$email_deja_affiche = [];

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
    <!-- End Google Tag Manager -->

    <title>Compte</title>
    <link rel="icon" href="../image/logo.png" type="image/x-icon">

    <script src="../script/jquery-3.6.0.min.js"></script>

    <!-- <script src="../script/summernote@0.8.18.js"></script>
    <link rel="stylesheet" href="../style/summernote@0.8.18.css"> -->

    <link rel="stylesheet" href="/css/compte.css">
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

    <?php include ('../include/header_users.php') ?>

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


        <div class="box">
            <h2>Compte Gmail utiliser</h2>
        </div>

        <?php foreach ($Mail as $email): ?>
            <?php

            $mails = $email['email'];
            // Récupérer tous les comptes groupés par adresse e-mail
            $query = "SELECT * FROM users WHERE mail = :mail";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':mail', $mails);
            $stmt->execute();
            $comptes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $nombreCompte = count($comptes);
            ?>
            <h3 class="h3">Comptes liés à l'adresse e-mail <span><?= $email['email'] ?></span> <strong><?= $nombreCompte ?></strong></h3>


            <div class="container containerss" id="aff" > 
                <img class="suprim" src="../image/croix.png" alt="">
            
           <div class="container_box">
           <?php foreach ($comptes as $user): ?>
    
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

        <a href="?suprime=<?= $user['id'] ?>"> <img src="/image/croix.png" alt="" id="supp"></a>
        <a href="?restore=<?= $user['id'] ?>"> <img src="/image/restore.png" alt="" id="rest"></a>
    <div>
      <img class="img" src="/image/profile.png" alt="">
      <h3><?= $user['nom'] ?> </h3>
      </div>
      <ul>
        <?php ?>
            <li><img src="/image/Netflix 2.png" alt=""</li>
            <li><img src="/image/prime video.png" alt=""></li>
        </ul>
        <p class="pin"><strong>Phone :</strong><?= $user['telephone'] ?></p>
        <p class="pin"><strong>PIN :</strong> <?= $user['pin']?></p>
        <p class="mail"> <strong>Mail : </strong><?= $user['mail'] ?></p>

        <h4><?= $user['plan'] ?> : <?= $user['montant'] ?> , <?= $user['fin'] ?></h4>
    </div>
    <?php endforeach ?>
           </div>
           
    
          </div>
        <?php endforeach; ?>
      

        <script>
    let mails = document.querySelectorAll('.h3');
    let tables = document.querySelectorAll('.containerss');
    let supp = document.querySelectorAll('.suprim');

    mails.forEach((mail, index) => {
        mail.addEventListener('click', () => {
                tables[index].style.display = 'block';
        });
    });

    supp.forEach((supps, index) => {
        supps.addEventListener('click', () => {
                tables[index].style.display = 'none';
        });
    });
</script>

    </section>

  

</body>

</html>