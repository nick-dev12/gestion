<?php if (isset($_SESSION['compte_entreprise'])): ?>
    <div class="messages">
        <div class="container_aff" id="message-container">
            <?php foreach ($afficheMessage2 as $Messages): ?>
                <?php $afficheInfoUsers = getInfoUsers($db, $Messages['users_id']) ?>
                <?php $afficheInfoEntreprise = getEntreprise($db, $Messages['entreprise_id']) ?>
                <?php if ($Messages['indicatif'] == 'recruteur'): ?>
                    <div class="box4" id="messages">

                        <div class="affi">
                            <?php if (isset($_SESSION['compte_entreprise'])): ?>
                                <a href="?suprime=<?= $Messages['message_id'] ?>"><img src="../image/croix.png" alt=""></a>
                            <?php endif; ?>
                            <p>
                                <?= $Messages['messages'] ?>
                            </p>
                            <span class="span">
                                <?= $Messages['date'] ?>
                            </span>
                        </div>
                        <img src="../upload/<?= $afficheInfoEntreprise['images'] ?>" alt="">
                    </div>
                <?php else: ?>
                    <div class="box2">
                        <img src="../upload/<?= $afficheInfoUsers['images'] ?>" alt="">
                        <div class="aff">

                            <p>
                                <?= $Messages['messages'] ?>
                            </p>
                            <span class="span">
                                <?= $Messages['date'] ?>
                            </span>

                        </div>

                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>



        <div class="container_box3">
            <div class="box3">
                <form action="" method="post">
                    <textarea name="messages" id="message-input" cols="30" rows="10"></textarea>
                    <button type="submit" name="envoyer1"><img src="../image/send.png" alt=""></button>
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php if (isset($_SESSION['users_id'])): ?>

    <div class="messages">
        <div class="container_aff" id="message-container">
            <?php foreach ($afficheMessage2 as $Messages): ?>
                <?php $infoEntreprise = getEntreprise($db, $Messages['entreprise_id']) ?>
                <?php $afficheInfoUsers = getInfoUsers($db, $Messages['users_id']) ?>
                <?php if ($Messages['indicatif'] == 'candidat'): ?>
                    <div class="box4">

                        <div class="affi">
                            <?php if (isset($_SESSION['users_id'])): ?>
                                <a href="?suprime=<?= $Messages['message_id'] ?>"><img src="../image/croix.png" alt=""></a>
                            <?php endif; ?>
                            <p>
                                <?= $Messages['messages'] ?>
                            </p>
                            <span class="span">
                                <?= $Messages['date'] ?>
                            </span>
                        </div>
                        <div>
                        <img src="../upload/<?= $afficheInfoUsers['images'] ?>" alt="">
                        </div>
                    </div>
                <?php else: ?>
                    <div class="box2">
                        <div>
                        <img src="../upload/<?= $infoEntreprise['images'] ?>" alt="">
                        </div>
                        <div class="aff">
                            <p>
                                <?= $Messages['messages'] ?>
                            </p>
                            <span class="span">
                                <?= $Messages['date'] ?>
                            </span>

                        </div>

                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="container_box3">
            <div class="box3">
                <form action="" method="post">
                    <textarea name="messages" id="message-input" cols="30" rows="10"></textarea>
                    <button type="submit" name="envoyer1"><img src="../image/send.png" alt=""></button>
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>