<?php
//login.php
session_start();
require_once __DIR__ . '/../vendor/autoload.php'; // change path as needed
$fb = new \Facebook\Facebook([
    'app_id' => '645452333574862',
    'app_secret' => 'abdbc1f61ea42366625f3969b2a7b780',
    'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://site.test/PHP0921E2_SKDA/Day30_Project_3_Login_FB_Gg_Send_mail_Cart_MVc/tutorial/login_fb/fb_callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
