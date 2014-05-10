<?
require_once 'common.php';

if (isset($_POST['target']) == false || isset($_POST['title']) == false || isset($_POST['accessToken']) == false || isset($_POST['content']) == false) {
	errorResponse('글 저장시 정확한 파라메터 값 전달 해주세요.');
} else {
	$target = $_POST['target'];
	$title = $_POST['title'];
	$accessToken = $_POST['accessToken'];
	$content = $_POST['content'];
	$visibility = $_POST['visibility'];

	$writeStatus = Tistory_Open_API::postWrite($accessToken, $target, $title, $content, $visibility);

?>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<? if ($writeStatus): ?>
<script>alert('정상적으로 글 작성이 되었습니다.'); self.location.href='./list.php?blog=<?=$target?>';</script>
<? else: ?>
<script>alert('글 저장을 실패하였습니다.'); history.back();</script>
<? endif; ?>
?>
</body>
</html>
<?
}
