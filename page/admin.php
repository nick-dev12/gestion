<?php
// Démarre la session
session_start();
if(empty($_SESSION['admin'])){
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5JBWCPV7');</script>
    <!-- End Google Tag Manager -->

    <link rel="icon" href="../image/logo.png" type="image/x-icon">
    <title>Bienvenu</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/aos.css" />
    <script src="../js/aos.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="navbare.css">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JBWCPV7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- menu carousel slider -->
    <div class="slider-area owl-carousel" data-aos="zoom-in">
        <div class="slider-item">
            <img src="image/netflix.jpg" alt="">
            <div class="box">
                <h1 data-aos="fade-up"> Netflix illimité : Des profils pour tous les goûts !</h1>
                <p data-aos="fade-up">Découvrez une nouvelle façon de regarder Netflix, Plongez dans un océan de divertissement sans vous ruiner. Profitez de tous vos films et séries préférés sur Netflix à un prix abordable avec notre abonnement exclusif.
                </p>

                <a data-aos="fade-up" href="/inscription.php">Commencer</a>
            </div>
        </div>
        <div class="slider-item">
            <img src="image/primevideo-seo-logo.png" alt="">
            <div class="box">
                <h1>Plongez dans un monde de divertissement avec Prime Video !</h1>
                <p>Explorez un vaste catalogue de films, séries TV et programmes originaux passionnants avec Prime Video. Des comédies hilarantes aux drames captivants, il y en a pour tous les goûts. Abonnez-vous dès maintenant et commencez votre aventure de streaming sans limite !</p>

                <a href="/inscription.html">Commencer</a>
            </div>
        </div>
        <div class="slider-item">
            <img src="image/disneyp.avif" alt="">
            <div class="box">
                <h1>Plongez dans l'univers Disney avec Disney+</h1>
                <p>Retrouvez tous vos personnages Disney préférés, où que vous soyez, avec Disney+. Des dessins animés classiques aux séries originales, des documentaires captivants aux films exclusifs. Abonnez-vous maintenant et laissez la magie commencer !</p>

               
            </div>
        </div>

        <div class="slider-item">
            <img src="image/Crunchyroll.png" alt="">
            <div class="box">
                <h1>Plongez dans l'univers des anime</h1>
                <p>Ne manquez jamais un seul instant de vos anime préférés avec Crunchyroll. Des nouvelles saisons aux classiques intemporels, des simulcasts aux séries exclusives, vivez l'expérience complète de l'anime à tout moment et en tout lieu. Abonnez-vous maintenant pour un accès illimité !</p>

               
            </div>
        </div>
      
        </div>
    </div>

    <section class="partie-box">
        <div class="box1">
            <h1>
            L'Univers du Streaming sous un Seul Abonnement, 
            </h1>
            <p>
            Netflix, Prime Video, Disney+ et Crunchyroll réunis ! Ne cherchez plus, tout ce que vous aimez regarder est réuni ici ! Avec notre abonnement, accédez à Netflix pour les séries addictives, à Prime Video pour les blockbusters, à Disney+ pour la magie, et à Crunchyroll pour les meilleurs animes.
            </p>
            <a href="/inscription.php">Commencer dés maintenant!</a>
            <div class="div4"></div>
        </div>
        <div class="box2">
            <img src="image/tt.webp" alt="" class="img1">
            <img src="image/streaming.jpg" alt="" class="img2">
        </div>
    </section>


    <section class="box-section">

        <section class="partie-box1">
            <div class="box2">
                <img src="image/univers.jpg" alt="">
            </div>
            <div class="box1">
                <h2>Simplicité d'abonnement en streaming.</h2>
            </div>

        </section>

    </section>



    <section class="reference">
        <div class="container">
            <div class="box1">
                <img src="image/netflix.jpg" alt="">
            </div>
            <div class="box2">
                <h1>Netflix à prix réduit !</h1>
                <p>Plongez dans un océan de divertissement sans vous ruiner.</p>
                <a href="/connection_compte.php">S'abonner</a>
            </div>
        </div>

        <div class="container">
            <div class="box1">
                <img src="image/primevideo-seo-logo.png" alt="">
            </div>
            <div class="box2">
                <h1>"Prime Video ! exclusif </h1>
                <p> Explorez un vaste catalogue de films, séries TV et programmes originaux</p>
                <a href="/connection_compte.php">S'abonner</a>
            </div>
        </div>

        <div class="container">
            <div class="box1">
                <img src="image/Crunchyroll.png" alt="">
            </div>
            <div class="box2">
                <h1>Abonnez-vous à Crunchyroll !</h1>
                <p> Vivez l'émotion de chaque instant avec Crunchyroll. Des séries populaires aux exclusivités</p>
                <a href="/connection_compte.php">S'abonner</a>
            </div>
        </div>

        <div class="container">
            <div class="box1">
                <img src="image/disneyp.avif" alt="">
            </div>
            <div class="box2">
                <h1>"Abonnez-vous à Disney+ ! </h1>
                <p> Plongez dans un monde rempli de magie, d'aventure et de nostalgie avec Disney+</p>
                <a href="/connection_compte.php">S'abonner</a>
            </div>
        </div>
    </section>



    <div class="div-section">
        <section class="section3 nth1">
            <h1>Streamez en toute simplicité avec notre service tout-en-un !</h1>
        </section>


        <section class="section3 nth2">
            <div class="box1">

                <div class="container">
                    <div class="texte">
                        <h2>
                        Accédez à vos plateformes de streaming préférées en un seul endroit, sans tracas ni complications.
                        </h2>
                        <p>
                        Fini les complications ! Avec notre service, vous pouvez accéder à une variété de plateformes de streaming sans avoir à gérer plusieurs comptes. C'est simple, c'est pratique, c'est tout ce dont vous avez besoin pour votre divertissement en ligne.
                        </p>
                    </div>
                </div>

            </div>
        </section>

    </div>

    <!-- ... -->
<footer class="styled-footer">
    <style>
        /* ... */

.styled-footer {
    background-color: #000000;
    color: #ffffff;
    text-align: center;
    padding: 25px 0;
    font-size: 0.9em;
    margin-top: -50px;
}

.containers {
    max-width: 1100px;
    margin: 0 auto;
}

/* ... */

    </style>
    <div class="containers">
        <p>&copy; 2024 Nick-Dev. Tous droits réservés.</p>
    </div>
</footer>
<!-- ... -->





    <!--
ScrollSmoother.min.js, InertiaPlugin.min.js, ScrambleTextPlugin.min.js, and SplitText.min.js are Club GreenSock perks which are not available on a CDN. Download them from your GreenSock account and include them locally like this:

<script src="/[YOUR_DIRECTORY]/ScrollSmoother.min.js"></script>
<script src="/[YOUR_DIRECTORY]/InertiaPlugin.min.js"></script>
<script src="/[YOUR_DIRECTORY]/ScrambleTextPlugin.min.js"></script>
<script src="/[YOUR_DIRECTORY]/SplitText.min.js"></script>

Sign up at https://greensock.com/club or try them for free on CodePen or CodeSandbox
-->
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <script src="/js/owl.animate.js"></script>
    <script src="/js/owl.autoplay.js"></script>


    <div></div>

    <script>

    </script>
    <script>
        $(document).ready(function () {


            $('.slider1 ').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                stagePadding: 10,
                smartSpeed: 900,
                nav: true,
            });


            $('.slider-area').owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 6000,
                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                smartSpeed: 900,
                stagePadding: 1,
                nav: true,
                navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>']
            });



            // Animation GSA
            // Initialiser le carrousel 1 avec la portée appropriée
            $('.carousel1').owlCarousel({
                items: 5,
                loop: true,
                autoplay: true,
                autoplayTimeout: 6000,
                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                stagePadding: 10,
                smartSpeed: 450,
                margin: 10,
                nav: true,
                navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>']
            });
            var carousel1 = $('.carousel1').owlCarousel();
            $('.owl-next').click(function () {
                carousel1.trigger('next.owl.carousel');
            })
            $('.owl-prev').click(function () {
                carousel1.trigger('prev.owl.carousel');
            });




            // Sélectionnez la section avec la classe "temoin"

            var sectionTemoin = document.querySelector('.temoin');

            // Vérifiez si la section existe
            if (sectionTemoin) {
                // Obtenez la liste des éléments enfants de la section
                var enfantsSection = sectionTemoin.children;

                // Vérifiez la condition du nombre d'éléments enfants
                if (enfantsSection.length > 3) {
                    // Code à exécuter si le nombre d'éléments enfants est supérieur à 3
                    $('.temoin').addClass('owl-carousel').owlCarousel({
                        items: 4,
                        loop: true,
                        autoplay: true,
                        autoplayTimeout: 3000,
                        animateOut: 'slideOutDown',
                        animateIn: 'flipInX',
                        stagePadding: 10,
                        smartSpeed: 650,
                        margin: 100,
                        nav: true,
                        responsive: {
                            0: {
                                items: 1,
                                margin: 20,
                            },
                            550: {
                                items: 2,
                            },
                            690: {
                                items: 3,

                            },
                            890: {
                                items: 3
                            },
                            1200: {
                                items: 4
                            },
                            1400: {
                                items: 4
                            }
                        }
                    });

                    // Code pour gérer la navigation du carousel
                    var carousel1 = $('.temoin').owlCarousel();
                    $('.owl-next').click(function () {
                        carousel1.trigger('next.owl.carousel');
                    })
                    $('.owl-prev').click(function () {
                        carousel1.trigger('prev.owl.carousel');
                    });
                } else {
                    // Code à exécuter si le nombre d'éléments enfants est inférieur ou égal à 3
                    console.log("Le nombre d'éléments enfants est inférieur ou égal à 3. Ne faites rien.");
                }
            } else {
                console.error("La section avec la classe 'temoin' n'a pas été trouvée.");
            }



            // Sélectionnez la section avec la classe "temoin"

            var owlSlider = document.querySelector('.owl-slider');

            // Vérifiez si la section existe
            if (owlSlider) {
                // Obtenez la liste des éléments enfants de la section
                var enfantSection = owlSlider.children;

                // Vérifiez la condition du nombre d'éléments enfants
                if (enfantSection.length > 2) {
                    // Code à exécuter si le nombre d'éléments enfants est supérieur à 3
                    $('.owl-slider').addClass('owl-carousel').owlCarousel({
                        items: 3,
                        loop: true,
                        autoplay: true,
                        autoplayTimeout: 3000,
                        animateOut: 'slideOutDown',
                        animateIn: 'flipInX',
                        stagePadding: 10,
                        smartSpeed: 450,
                        margin: 100,
                        nav: true,
                        responsive: {
                            0: {
                                items: 1,
                                margin: 0,
                            },
                            460: {
                                items: 2,

                            },
                            550: {
                                items: 2,

                            },
                            890: {
                                items: 2,

                            },
                            1200: {
                                items: 3
                            },
                            1400: {
                                items: 3
                            }
                        }
                    });

                    // Code pour gérer la navigation du carousel
                    var carousel1 = $('.owl-carousel').owlCarousel();
                    $('.owl-next').click(function () {
                        carousel1.trigger('next.owl.carousel');
                    })
                    $('.owl-prev').click(function () {
                        carousel1.trigger('prev.owl.carousel');
                    });
                } else {
                    // Code à exécuter si le nombre d'éléments enfants est inférieur ou égal à 3
                    console.log("Le nombre d'éléments enfants est inférieur ou égal à 3. Ne faites rien.");
                }
            } else {
                console.error("La section avec la classe 'temoin' n'a pas été trouvée.");
            }




            $('.slider-area').owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 6000,
                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                smartSpeed: 900,
                stagePadding: 1,
                nav: true,
                navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>']
            });


        });






    </script>

    <script>
        // ..
        AOS.init();
    </script>
</body>

</html>