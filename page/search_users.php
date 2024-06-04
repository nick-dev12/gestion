<?php
session_start();
if(empty($_SESSION['admin'])){
    header('Location: connexion.php');
}
require ('../conn/conn.php');


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

        header('Location: ../page/search.php');
        exit();
    } else {
        // Champ de recherche vide, afficher un message d'erreur
        $erreurs = 'Le champ de recherche ne doit pas être vide !';
    }
}



// Vérifier si les résultats de la recherche sont disponibles dans la session
if (isset($_SESSION['resultates'])) {
    // Récupérer les résultats de la recherche
    $resultates = $_SESSION['resultates'];
    shuffle($resultates);
     // Effacer les résultats de la recherche de la session (facultatif)
     unset($_SESSION['resultates']);
     // Vous pouvez aussi effacer les résultats avec unset($_SESSION['resultats']); si vous ne voulez plus les garder en mémoire
} else {
   
}


if(isset($_GET['suprime'])){

    $rech = "SELECT * FROM users WHERE id = :id";
    $stmt_rech = $db->prepare($rech);
    $stmt_rech->bindParam(':id', $_GET['suprime']);
    $stmt_rech->execute();
    $Users = $stmt_rech->fetch(PDO::FETCH_ASSOC);
    
    $nom = $Users['nom'];
    $tell = $Users['telephone'];
    $montant = $Users['montant'];
    $debut = $Users['debut'];
    $fin = $Users['fin'];
    $mail = $Users['mail'];
    $pin = $Users['pin'];
    $Netflix = $Users['Netflix'];
    $primevideo = $Users['primevideo'];
    $disney = $Users['disney'];
    $Crunchyroll = $Users['Crunchyroll'];
    $statut = $Users['statut'];
    
          // Prépare la requête d'insertion
          $sauv = "INSERT INTO deletes (nom, telephone, montant, debut, fin, mail,pin , Netflix, primevideo, disney, Crunchyroll, statut) VALUES (:nom, :telephone, :montant, :debut, :fin, :mail ,:pin , :Netflix, :primevideo, :disney, :Crunchyroll, :statut)";
          $sauvegarde = $db->prepare($sauv);
      
          // Liaison des valeurs
          $sauvegarde->bindParam(':nom', $nom);
          $sauvegarde->bindParam(':telephone', $tell);
          $sauvegarde->bindParam(':montant', $montant);
          $sauvegarde->bindParam(':debut',  $debut);
          $sauvegarde->bindParam(':fin', $fin);
          $sauvegarde->bindParam(':mail', $mail);
          $sauvegarde->bindParam(':pin', $pin);
          $sauvegarde->bindParam(':Netflix', $Netflix);
          $sauvegarde->bindParam(':primevideo', $primevideo);
          $sauvegarde->bindParam(':disney', $disney);
          $sauvegarde->bindParam(':Crunchyroll', $Crunchyroll);
          $sauvegarde->bindParam(':statut', $statut);
          $sauvegarde->execute();


    $sup = "DELETE FROM users WHERE id=:id";
    $stmt_sup = $db->prepare($sup);
    $stmt_sup->bindParam(':id', $_GET['suprime']);
    $stmt_sup->execute();

    header('Location: ../index.php');
    exit();
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
    <!-- End Google Tag Manager -->

    <title>Profil</title>
    <link rel="icon" href="../image/logo.png" type="image/x-icon">

    <script src="../script/jquery-3.6.0.min.js"></script>

    <!-- <script src="../script/summernote@0.8.18.js"></script>
    <link rel="stylesheet" href="../style/summernote@0.8.18.css"> -->

    <link rel="stylesheet" href="/css/user_profil.css">
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

    <img src="../image/fleche.png" alt="" class="img222">
        <script>
            let img222 = document.querySelector('.img222');
            let section2 = document.querySelector('.section2');
            let img111 = document.querySelector('.img111');

            img222.addEventListener('click', () => {
                section2.style.marginLeft = '0px';
                img222.style.display = 'none';
            });

            img111.addEventListener('click', () => {
                section2.style.marginLeft = '-150%';
                img222.style.display = 'block';
            });
        </script>

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


        <div class="box">
            <h2>Resultats </h2>
        </div>



        <table class="styled-table">
            <thead>
                <tr><th>Modif</th>
                    <th>Profil</th>
                    <th>Nom</th>
                    <th>Abonnement</th>
                    <th>Montant</th>
                    <th>Numéro de Téléphone</th>
                    <th>Adresse Mail</th>
                    <th>Fin</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $resultates as $user): ?>
                        <?php
                        $sql = " SELECT fin FROM users WHERE id = :id";
                        $stmt = $db->prepare($sql);
                        $stmt->bindParam(':id', $user['id']);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                        $date_expiration = DateTime::createFromFormat('Y-m-d', $result['fin']);

                        $new = new DateTime();
                        $diff = $date_expiration->diff($new);

                        if ($new > $date_expiration) {
                            $statut = 'expirer';
                            // Mets à jour le statut du compte
                            $stmt = $db->prepare('UPDATE users SET statut = :statut WHERE id = :id');
                            $stmt->bindParam(':statut', $statut);
                            $stmt->bindParam(':id', $user['id']);
                            $stmt->execute();
                        }
                        ?>
                        <?php if($user['statut']=== 'expirer') :?>
                        <tr id="ex" >
                            <?php else: ?>
                                <?php if ($diff->days <= 5) : ?>
                                <tr id="exs">
                        <?php endif; ?>
                        <?php endif; ?>
                        <td class="sup"><a href="users.php?id=<?= $user['id'] ?>"><img src="/image/mod.png" alt=""></a></td>
                            <td><img src="/image/Netflix 2.png" alt=""></td>
                            <td><?= $user['nom'] ?></td>
                            <td><?= $user['Netflix'] ?></td>
                            <td><?= $user['montant'] ?> fca</td>
                            <td><?= $user['telephone'] ?></td>
                            <td><?= $user['mail']?>  <em><?= $user['pin'] ?></em></td>
                            <td><?= $user['fin'] ?></td>
                            <?php if($user['statut'] === 'a jour') :?>
                            <td class="td" ><?= $user['statut'] ?></td>
                            <?php else :?>
                            <td><?= $user['statut'] ?></td>
                            <?php endif; ?>
                        </tr>
                <?php endforeach; ?>
                <!-- Ajoutez plus de lignées (tr) ici pour plus d'entrées -->
            </tbody>

           
            
        </table>



    </section>



    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <script src="/js/owl.animate.js"></script>
    <script src="/js/owl.autoplay.js"></script>


    <script>



        $(document).ready(function () {
            // Carrousel 3  
            var carousel3 = $('.carousel3');
            var numItems2 = carousel3.find('.carousel').length;

            if (numItems2 > 3) {

                // Initialiser Owl carousel3 si il y a plus de 4 éléments
                carousel3.owlCarousel({
                    items: 3, // Limitez le nombre d'éléments à afficher à 5
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    animateOut: 'slideOutDown',
                    animateIn: 'flipInX',
                    stagePadding: 30,
                    smartSpeed: 650,
                    nav: true,
                    responsive: {
                        0: {
                            items: 1,
                            margin: 0,
                        },
                        550: {
                            items: 1,
                        },
                        890: {
                            items: 2
                        },
                        1200: {
                            items: 2
                        },
                        1400: {
                            items: 3
                        }
                    }
                });

                var carousel3 = $('.carousel3').owlCarousel();
                $('.owl-next').click(function () {
                    carousel3.trigger('next.owl.carousel');
                })
                $('.owl-prev').click(function () {
                    carousel3.trigger('prev.owl.carousel');
                })



            } else {

                carousel3.trigger('destroy.owl.carousel');
                carousel3.removeClass('owl-carousel owl-loaded');
                carousel3.find('.owl-stage-outer').children().unwrap();

            }


        });
    </script>

</body>

</html>