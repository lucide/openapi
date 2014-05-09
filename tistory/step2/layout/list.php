<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Simple Blogging Tool for Tistory | 글목록</title>
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
        body {position:absolute;width:100%;min-width:640px;height:100%;margin:0;padding:0;}
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
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#">Simple Blogging Tool for Tistory</a>
            <ul class="nav pull-right">
                <li class="divider-vertical"></li>
                <li><a href="#">OPEN API 테스트 님이 로그인 되셨습니다.</a></li>
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">블로그 선택 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">첫번째 블로그</a></li>
                        <li><a href="#">두번째 블로그</a></li>
                        <li><a href="#">세번째 블로그</a></li>
                        <li><a href="#">네번째 블로그</a></li>
                        <li><a href="#">다섯번째 블로그</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="alert alert-success">
    현재 활성화된 블로그는 첫번째 블로그 입니다.
</div>
<div class="alert alert-error">
    활성화된 블로그가 없습니다. 우측 상단에서 활성화 블로그를 선택해 주세요.
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <ul class="nav nav-list">
                <li class="nav-header">
                    Menu
                </li>
                <li class="active">
                    <a href="#">게시글 목록보기</a>
                </li>
                <li>
                    <a href="#">글쓰기</a>
                </li>
            </ul>
        </div>
        <div class="span10">
            <ul class="breadcrumb">
                <li class="active">TISTORY OPEN API 를 이용한 글목록과 글 읽기 예제 페이지 입니다.</li>
            </ul>
            <ul class="nav nav-tabs nav-stacked">
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 8</a></li>
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 7</a></li>
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 6</a></li>
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 5</a></li>
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 4</a></li>
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 3</a></li>
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 2</a></li>
                <li><a data-toggle="modal" href="#myModal">[2012.08.03] 게시글 게시글 1</a></li>
            </ul>
            <div class="pagination pagination-centered">
                <ul>
                    <li><a href="#">이전</a></li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">다음</a></li>
                </ul>
            </div>
        </div>

        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <h3>글 제목 입니다.</h3>
            </div>
            <div class="modal-body">
                글 내용 입니다.
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" target="_blank">원문보기</a>
                <a href="#" class="btn" data-dismiss="modal">닫기</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#myModal').modal({
        show : false,
        keyboard: false
    })
</script>
</body>
</html>