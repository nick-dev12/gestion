<?php


// if (isset($_SESSION['users_id'])) {
//     // L'utilisateur est connecté, récupérez son ID
//     $users_id = $_SESSION['users_id'];

//     // Maintenant, vous pouvez utiliser $users_id pour récupérer les informations de l'utilisateur depuis la base de données
//     // Écrivez votre requête SQL pour récupérer les informations nécessaires
//     $conn = "SELECT * FROM users WHERE id = :users_id";
//     $stmt = $db->prepare($conn);
//     $stmt->bindParam(':users_id', $users_id);
//     $stmt->execute();
//     $users = $stmt->fetch(PDO::FETCH_ASSOC);
// } else {

//     if (isset($_SESSION['compte_entreprise'])) {
//         // L'utilisateur est connecté, récupérez son ID
//         $entreprise_id = $_SESSION['compte_entreprise'];

//         // Maintenant, vous pouvez utiliser $entreprise_id pour récupérer les informations de l'utilisateur depuis la base de données
//         // Écrivez votre requête SQL pour récupérer les informations nécessaires
//         $conn = "SELECT * FROM compte_entreprise WHERE id = :entreprise_id";
//         $stmt = $db->prepare($conn);
//         $stmt->bindParam(':entreprise_id', $entreprise_id);
//         $stmt->execute();
//         $entreprise = $stmt->fetch(PDO::FETCH_ASSOC);
//     } else {
//         if (isset($_SESSION['admin'])) {
//             // L'utilisateur est connecté, récupérez son ID
//             $admin = $_SESSION['admin'];

//             // Maintenant, vous pouvez utiliser $admin pour récupérer les informations de l'utilisateur depuis la base de données
//             // Écrivez votre requête SQL pour récupérer les informations nécessaires
//             $conn = "SELECT * FROM admin WHERE id = :admin";
//             $stmt = $db->prepare($conn);
//             $stmt->bindParam(':admin', $admin);
//             $stmt->execute();
//             $admins = $stmt->fetch(PDO::FETCH_ASSOC);
//         }
//     }
// }


?>

<link rel="stylesheet" href="navbare.css">

<nav>
    <a class="logo" href="../index.php"> <img src="/image/logo.jpeg " alt="logo"></a>

   

                <div class="box3">
                    <a href="/inscription.php">Inscription</a>
                </div>

    <div class="box_info">
        <?php if (isset($_SESSION['users_id'])): ?>
            <img class="affiche" src="/upload/<?= $users['images'] ?>" alt="">
            <img class="del" src="/image/croix.png" alt="">
            <table>
                <tr>
                    <th>Nom</th>
                    <td>
                        <?php echo $users['nom']; ?>
                    </td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td>
                        <?php echo $users['mail']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td>
                        <?php echo $users['phone']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Ville</th>
                    <td>
                        <?php echo $users['ville']; ?>
                    </td>
                </tr>
                <tr>
                    <th>domaine</th>
                    <td>
                        <?php echo $users['competences']; ?>
                    </td>
                </tr>
            </table>

            <a href="../page/user_profil.php">Voir mon profil</a>

        <?php else: ?>

            <?php if (isset($_SESSION['compte_entreprise'])): ?>

                <img class="del" src="/image/croix.png" alt="">
                <img class="affiche" src="/upload/<?= $entreprise['images'] ?>" alt="">

                <table>
                    <tr>
                        <th>Nom</th>
                        <td>
                            <?php echo $entreprise['nom']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>
                            <?php echo $entreprise['mail']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Téléphone</th>
                        <td>
                            <?php echo $entreprise['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Ville</th>
                        <td>
                            <?php echo $entreprise['ville']; ?>
                        </td>
                    </tr>
                    <!-- <tr>
                    <th>domaine</th>
                    <td><?php echo $entreprise['competences']; ?></td>
                </tr> -->
                </table>

                <a href="../entreprise/entreprise_profil.php">Voir mon profil</a>

            <? else: ?>
                <?php if (isset($_SESSION['admin'])): ?>

                    <img class="del" src="/image/croix.png" alt="">
                    <img class="affiche" src="/upload/<?= $entreprise['images'] ?>" alt="">

                    <table>
                        <tr>
                            <th>Nom</th>
                            <td>
                                <?php echo $admins['nom']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td>
                                <?php echo $admins['mail']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Téléphone</th>
                            <td>
                                <?php echo $admins['phone']; ?>
                            </td>
                        </tr>

                    </table>

                    <a href="/admin/t_admin.php">Voir mon profil</a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>


    <script>
        let affiche = document.querySelector('.infos_users');
        let boxInfo = document.querySelector('.box_info');
        let del = document.querySelector('.del');

        affiche.addEventListener('click', () => {
            boxInfo.style.right = '5%';
        });

        del.addEventListener('click', () => {
            boxInfo.style.right = '-200%';
        });


    </script>
</nav>
