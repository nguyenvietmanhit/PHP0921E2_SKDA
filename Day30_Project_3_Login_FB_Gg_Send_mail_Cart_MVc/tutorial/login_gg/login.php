<?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '271367576688-qk5h7p8es7pt3neanjgk3ng3sa89ujpt.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/docker/login_fb_gg/gg-callback.php';

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
