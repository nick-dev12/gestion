<?php

// Démarrez la session (s'il n'a pas déjà été démarré)
session_start();

// Effacer toutes les données de session
session_unset();

// Détruire la session en cours
session_destroy();

// Supprimer le cookie remember_me
setcookie('remember_me', '', time() - 3600, '/'); // expiration dans le passé

// Rediriger vers la page de connexion ou une autre page après la déconnexion
header('location: ../connexion.php');
exit();
