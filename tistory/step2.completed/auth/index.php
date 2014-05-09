<?
require_once '../class.Tistory.Open.API.php';

$authorization_code = $_REQUEST['code'];

$client_id = Tistory_Open_API::$CLIENT_ID;
$client_secret = Tistory_Open_API::$CLIENT_SECRET;
$redirect_uri = Tistory_Open_API::$REDIRECT_URI;

$grant_type = 'authorization_code';
$url = 'https://www.tistory.com/oauth/access_token/?code=' . $authorization_code . '&client_id=' . $client_id . '&client_secret=' . $client_secret . '&redirect_uri=' . urlencode($redirect_uri) . '&grant_type=' . $grant_type;

$accessToken = file_get_contents($url);

if ($accessToken && strpos($accessToken, 'access_token=') !== false) {
    $accessToken = str_replace('access_token=', '', $accessToken);

    setcookie("accessToken", '', time() - 3600, '/', Tistory_Open_API::$DOMAIN);
    setcookie("accessToken", $accessToken, time() + 31536000, '/', Tistory_Open_API::$DOMAIN);
}

header('Location: ' . 'http://'. Tistory_Open_API::$DOMAIN .'/list.php');