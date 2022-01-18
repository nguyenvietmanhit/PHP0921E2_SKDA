<?php
require_once '../vendor/autoload.php';

// init configuration
$clientID = '585454199164-lg5usp2ug49qg0t4l74th7h7daekdiap.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/PHP0921E2_SKDA/Day30_Project_3_Login_FB_Gg_Send_mail_Cart_MVc/tutorial/login_gg/login.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    echo "<pre> Line: " . __LINE__ . ", File: " . __FILE__ . "\n";
    print_r($google_account_info);
    echo "</pre>";
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    var_dump($email);
    var_dump($name);

    // now you can use this profile info to create account in your website and make user logged in.
} else {
    echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>
