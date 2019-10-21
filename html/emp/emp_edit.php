<?
	include "../common.php";
?>
<html>
<head>
	<title>주소록 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>

<body>

<?
	$query = "select * from emp where no35 = $no;";
	$result = mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	$row = mysqli_fetch_array($result); // 1 레코드 읽기

	$tel1=trim(substr($row[tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
	$tel2=trim(substr($row[tel35],3,4));        // 3번 위치에서 4자리
	$tel3=trim(substr($row[tel35],7,4));        // 7번 위치에서 4자리
?>

<form name="form1" method="post" action="emp_update.php">

<input type="hidden" name="no1" value="<?=$row[no35]?>">

<table width="500" border="1" cellpadding="2" bgcolor="lightyellow" style="border-collapse:collapse">
  <tr>
    <td width="100" align="center" bgcolor="lightblue">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name35]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">전화</td>
    <td width="400" align="left">
      <input type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1?>"> -
      <input type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2?>"> -
      <input type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3?>">
    </td>
  </tr>
</table>
<br>
<table width="500" border="0">
  <tr>
    <td align="center"> 
		<input type="submit" value="수정"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>