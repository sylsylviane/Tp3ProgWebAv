<?php

session_start();
require_once 'config.php';
require_once 'vendor/autoload.php';
require_once 'routes/web.php';

use App\Models\Journal;

$journal = new Journal;
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];
} else {
    $username = 'Invité';
}
$page_visitee = $_SERVER['REQUEST_URI'];

$insert = $journal->insert(['adresse_ip' => $ip, 'nom_utilisateur' => $username, 'page_visitee' => $page_visitee]);



