<?
	if (!isset($_REQUEST['code']) && isset($_REQUEST['error'])) {
		echo "Error : " . $_REQUEST['error'] . '<br />';
		echo "Error Description : " . $_REQUEST['error_description']; exit;
	} 

	/**
	 * 티스토리로 부터 받은 code와 함께 access_token 요청을 합니다.
	 */
	$authorization_code = $_REQUEST['code'];
		
	$client_id = 'CLIENT_ID';
	$client_secret = 'CLIENT_SECRET';
	$redirect_uri = 'CALLBACK_URI';
	$grant_type = 'authorization_code';   //반드시 이단계에서는 authorization_code 라고 입력

	$url = 'https://www.tistory.com/oauth/access_token/?code=' . $authorization_code . '&client_id=' . $client_id . 
			'&client_secret=' . $client_secret . '&redirect_uri=' . rawurlencode($redirect_uri) . '&grant_type=' . $grant_type;

	$access_token = file_get_contents($url);
	echo $access_token;