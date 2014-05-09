<?
    require_once 'class.Tistory.Open.API.php';

    if (isset($_COOKIE['accessToken'])) {
        echo ("<script>self.location.href='./list.php';</script>"); exit;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Simple Blogging Tool for Tistory | Login</title>
    <link type="text/css" rel="stylesheet" href="/css/common.css" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="./css/nav_and_notification.css" rel="stylesheet">
    <link href="./Frameworks/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./Frameworks/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="./Frameworks/jquery/jquery-1.7.2.js"></script>
    <script src="./Frameworks/jquery-ui/js/jquery-ui-1.8.20.custom.min.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
    <script src="./Frameworks/bootstrap/js/bootstrap.js"></script>
    <script src="./Frameworks/Toast.js"></script>
    <style>
        body {position:absolute;width:100%;min-width:640px;height:100%;margin:0;padding:0;background:url(./images/bg.png)}
        .eng {font-family:verdana;font-size:9px}
        .separator {margin:0 5px;color:#696969}

        #header {position:absolute;width:100%;min-width:640px;height:17px;padding:5px 0;color:white;background:#191919}
        #header .title {margin:10px 30px 10px 10px}
        #header .info_section {float:right;padding-right:15px}
        #header a {color:#ccc; padding:0 5px}
        #canvas {position:absolute;left:50%;background:white}
        #canvasMaskLayer {display:none;width:1024px;height:768px;background:black;opacity:0.5;margin-left: -512px; margin-top: -384px;top:50%;left:50%;position:absolute;text-align:center}
        #footer {position:fixed;bottom:0;width:100%;min-width:640px;height:28px;background:#f0f0f0}
        #footer .current_event {float:left;display:block;color:#999;margin:5px 0 0 10px}
        #footer .info_section {float:right;margin-right:4px}
        #footer .nav_and_notification {float:right}
        #modalChat {position:absolute;bottom:30px; right:5px; width:250px;height:400px;border:1px solid #d9d9d9;background:white;opacity:0.9;display:none}
        #modalChatHeader:hover {cursor:move}
    </style>
</head>
<body>

<style type="text/css">
    .form-horizontal {width:510px;margin:0 auto}
    .form-horizontal .controls {margin-left:120px}
    .form-horizontal .control-label {width:420px; text-align: left}
    .form-horizontal .input-idsave {margin:0}
    .form-horizontal .alert {text-align:center}
</style>

<form class="form-horizontal" method="GET" action="https://www.tistory.com/oauth/authorize/">
    <fieldset>
        <legend>Authorization</legend>
        <div class="control-group">
            <label class="control-label">Simple Blogging Tool을 이용하기 위하여 우측 인증하기 버튼을 눌러주세요</label>
            <div class="controls">
                <button type="submit" class="btn btn-primary">인증하기</button>
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="client_id" value="<?=Tistory_Open_API::$CLIENT_ID?>" />
    <input type="hidden" name="redirect_uri" value="<?=Tistory_Open_API::$REDIRECT_URI?>" />
    <input type="hidden" name="response_type" value="code" />
</form>

</body>
</html>
