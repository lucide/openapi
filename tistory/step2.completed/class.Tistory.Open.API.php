<?
class Tistory_Open_API {
    public static $CLIENT_ID = 'CLIENT_ID';
    public static $CLIENT_SECRET = 'CLIENT_SECRET';
    public static $REDIRECT_URI = 'CALLBACK_URI';
    public static $DOMAIN = 'SERVICE_DOMAIN';

    public static function sendRequest($uri, $params) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);

        if ($result == false) {
            trigger_error(curl_error($ch));
        }

        curl_close($ch);

        $result = json_decode($result, true);

        if ($result == false) {
            return false;
        }

        return $result;
    }

    public static function getPostList($accessToken, $target, $page = 1, $size = 10) {

        $target = str_replace('http://', '', $target);
        $target = str_replace('.tistory.com', '', $target);

        $params = 'targetUrl=' . $target . '&access_token=' . $accessToken . '&output=json' . '&page=' . $page . '&count=' . $size;

        $list = self::sendRequest('https://www.tistory.com/apis/post/list', $params);

        if ($list) {
            $status = $list['tistory']['status'];

            if ($status == 200) {
                return array('totalSize' => $list['tistory']['item']['totalCount'] , 'posts' => $list['tistory']['item']['posts']['post']);
            }
        }

        return false;
    }

    public static function getPostContent($accessToken, $target, $postId) {
        $target = str_replace('http://', '', $target);
        $target = str_replace('.tistory.com', '', $target);

        $params = 'targetUrl=' . $target . '&access_token=' . $accessToken . '&output=json' . '&postId=' . $postId;

        $list = self::sendRequest('https://www.tistory.com/apis/post/read', $params);

        if ($list) {
            $status = $list['tistory']['status'];

            if ($status == 200) {
                return array('title' => $list['tistory']['item']['title'] , 'content' => $list['tistory']['item']['content']);
            }
        }

        return false;
    }

    public static function postWrite($accessToken, $target, $title, $content) {
        $target = str_replace('http://', '', $target);
        $target = str_replace('.tistory.com', '', $target);

        $params = 'targetUrl=' . $target . '&access_token=' . $accessToken . '&output=json' . '&title=' . $title . '&content=' . $content;

        $response = self::sendRequest('https://www.tistory.com/apis/post/write', $params);

        if ($response) {
            $status = $response['tistory']['status'];

            if ($status == 200) {
                return true;
            }
        }

        return false;
    }
}
