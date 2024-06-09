<link rel="stylesheet" href="../css/section2.css">


<!-- <section class="section2">
    
<img src="../image/croix.png" alt="" class="img111">

    <div class="container">
        <h1>Tableau de bord</h1>
        <ul>
            <li class="tr5">
                <a class="a5" href="../page/modifier.php"><img src="../image/mo.png" alt="">Modifier</a>
            </li>

            <li class="tr4">
                <a id="a4" href="../page/delete.php"> <img src="../image/in.png" alt="">Compte Suprimer</a>
            </li>

            <li class="tr1">
                <a class="a1" href="../index.php"><img src="../image/ut.png" alt=""> Utilisateurs</a>
            </li>
            <li class="tr2">
                <a class="a2" href="../page/expiration.php"><img src="../image/ex.png" alt="">Expiration</a>
            </li>
            <li class="tr3">
                <a class="a3" href="../page/renouveler.php"><img src="../image/re.png" alt="">Renouvelement</a>
            </li>
            <li class="tr6">
                <a class="a6" href="../page/compte.php"><img src="../image/profil.png" alt="">Mes comptes</a>
            </li>
        </ul>
    </div>
</section> -->





<link rel="stylesheet" href="../css/section2.css">


<section class="section2 ste" id="ste">
    <img src="../image/croix.png" alt="" class="img111" id="img24">
 

    <div class="containers">

        <div class="box1">
            <span></span>

        </div>

        <div class="box3">
            <ul>
                <a href="../page/modifier.php">
                    <li class="tr3"><img src="../image/modifier.png" alt=""> <span class="td">Modifier</span></li>
                </a>

                <a href="../page/delete.php">
                    <li class="tr"><img src="../image/suprimer.png" alt=""> <span class="td">Compte Suprimer</span></li>
                </a>

                <a href="/index.php">
                    <li class="tr4"><img src="../image/utilisateur.png" alt=""> <span class="td">Utilisateurs</span></li>
                </a>

                <a href="../page/expiration.php">
                    <li class="tr1"><img src="../image/Expiration.png" alt=""><span class="td">Expiration</span>
                    </li>
                </a>

                <a href="../page/expiration5jour.php">
                    <li class="tr7"><img src="../image/ex.png" alt=""><span class="td">Expiration dans 5jours</span>
                    </li>
                </a>

                <a href="../page/renouveler.php">
                    <li class="tr2"><img src="../image/renouveler.png" alt=""><span class="td">Renouvelement</span>
                    </li>
                </a>

                <a href="../page/compte.php">
                    <li class="tr5"><img src="../image/mail.png" alt=""> <span class="td">Mes comptes</span></li>
                </a>

                <a href="../page/compte_disponible.php">
                    <li class="tr8"><img src="../image/mail.png" alt=""> <span class="td">Places disponibles</span></li>
                </a>
            </ul>

        </div>

        <a class="a" href="/conn/dconn_users.php">Deconnexion</a>
    </div>
   


</section>



<section class="section2 menu" id="menu">
    <img class="img23" id="img23" src="../image/fleche.png" alt="">
    <div class="container">
        <div class="box1">
          
            <span></span>

        </div>


        <div class="box3">
            <ul>
                <a href="../page/modifier.php">
                    <li class="tr3"><img src="../image/modifier.png" alt=""></li>
                </a>

                <a href="../page/delete.php">
                    <li class="tr"><img src="../image/suprimer.png" alt=""></li>
                </a>

                <a href="/index.php">
                    <li class="tr4"><img src="../image/utilisateur.png" alt=""> </li>
                </a>

                <a href="../page/expiration.php">
                    <li class="tr1"><img src="../image/Expiration.png" alt="">
                    </li>
                </a>

                <a href="../page/expiration5jour.php">
                    <li class="tr7"><img src="../image/ex.png" alt="">
                    </li>
                </a>

                <a href="../page/renouveler.php">
                    <li class="tr2"><img src="../image/renouveler.png" alt="">
                    </li>
                </a>

                <a href="../page/compte.php">
                    <li class="tr5"><img src="../image/mail.png" alt=""> </li>
                </a>

                <a href="../page/compte_disponible.php">
                    <li class="tr8"><img src="../image/mail.png" alt=""> </li>
                </a>
            </ul>

        </div>
    </div>



</section>

<script>
    // Sélectionne l'élément avec la classe 'img' et l'assigne à img222
    let cache = document.getElementById('img23');

    let section = document.querySelector('.section2')
    // Sélectionne l'élément avec la classe 'ste' et l'assigne à section2
    let section2 = document.getElementById('ste');

    // Sélectionne l'élément avec la classe 'menu' et l'assigne à menu
    let menu1 = document.getElementById('menu');

    // Sélectionne l'élément avec la classe 'img111' et l'assigne à img111
    let img111 = document.getElementById('img24');

    // Ajoute un événement de clic à img222
    cache.addEventListener('click', () => {
        // Lorsque img222 est cliqué, déplace section2 à gauche (visible) et cache menu
        section2.style.left = '0';
        menu1.style.left = '-400px';
    });

    // Ajoute un événement de clic à img111
    img111.addEventListener('click', () => {
        // Lorsque img111 est cliqué, cache section2 et montre menu
        section2.style.left = '-100%';
        menu1.style.left = '0';
    });

</script>