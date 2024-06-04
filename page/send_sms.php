<?php
require ('../conn/conn.php');
require_once ('../vendor/autoload.php'); // if you use Composer
//require_once('ultramsg.class.php'); // if you download ultramsg.class.php

$sql = "SELECT * FROM users ";
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    if ($user['statut'] === '-5jours') {
        $N_telephone = $user['telephone'];
        $ultramsg_token = "wlclenqf1qpeoy5c"; // Ultramsg.com token
        $instance_id = "instance87257"; // Ultramsg.com instance id
        $client = new UltraMsg\WhatsAppApi($ultramsg_token, $instance_id);

        $to = $N_telephone;
        $body = "Votre abonnement arrive à expiration. Pour plus d\'informations, veuillez consulter notre site web.";
        $api = $client->sendChatMessage($to, $body);
        print_r($api);
    }
}
