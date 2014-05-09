<?
class Tistory_Open_API {
    public static $CLIENT_ID = '71613283df0b0b377bae39c0bdfc40af';
    public static $CLIENT_SECRET = 'b3f909797236ec11e0c7162a685f00d29fda1b3858a65b903ee54dbda71befc08205df62';
    public static $REDIRECT_URI = 'http://openapi.dev.tistory.com/auth';
    
    public static function sendRequest($uri, $params) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

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
