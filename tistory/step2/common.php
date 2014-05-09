<?
include 'class.Tistory.Open.API.php';

if (isset($_COOKIE['accessToken']) == false) {
    errorResponse('사용자 인증이 되지 않았습니다. 인증이 필요합니다.');
}

$accessToken = $_COOKIE['accessToken'];
$params = 'access_token=' . $accessToken . '&output=json';

$info = Tistory_Open_API::sendRequest('https://www.tistory.com/apis/blog/info', $params);
$status = $info['tistory']['status'];

if ($status != 200) {
    errorResponse('사용자 인증이 되지 않았습니다. 인증이 필요합니다.');
}

$nickName = $info['tistory']['item'][0]['nickname'];

$blogList = array();

foreach($info['tistory']['item'] as $blog) {
    array_push($blogList, array('title' => $blog['title'], 'url' => $blog['url']));
}

$isCorrectBlog = false;

if (isset($_GET['blog'])) {
    foreach($blogList as $blog) {
        if ($blog['url'] == $_GET['blog']) {
            $isCorrectBlog = true;
        }
    }
}

function errorResponse($message) {
	ob_start();
?>
	<html>
	<head>
	    <meta charset="utf-8" />
	</head>
	<body>
		<script>alert('<?=$message?>'); self.location.href='./index.php';</script>
	</body>
	</html>
<?
	$msg = ob_get_clean();
	echo $msg;
	exit;
}