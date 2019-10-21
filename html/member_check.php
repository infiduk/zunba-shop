<?
include "common.php";

$uid=$_POST[uid];
$pwd=$_POST[pwd];

$query = "select no35, name35 from member where uid35='$uid' and pwd35='$pwd';";
$result = mysqli_query($db, $query); // sql문 실행
if(!$result) exit("쿼리에러 $query"); // 에러 조사
$count = mysqli_num_rows($result); // 레코드 개수

if ($count > 0) {
	$row = mysqli_fetch_array($result);
	setcookie("cookie_no", $row[no35]);
	setcookie("cookie_name", $row[name35]);
	echo("<script>location.href = 'index.html'</script>");
}
else echo("<script>location.href = 'member_login.php'</script>");
?>