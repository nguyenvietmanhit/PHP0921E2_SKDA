<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed
$fb = new \Facebook\Facebook([
    'app_id' => 'APP_ID',
    'app_secret' => 'APP_SECRET',
    'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('DOMAIN', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';