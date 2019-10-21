<?
	include "../common.php";
?>

<html>
<head>
	<title>앨범 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>

<?
  $query = "select * from album where no35 = $no;";
	$result = mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	$row = mysqli_fetch_array($result); // 1 레코드 읽기
?>

<form name="form1" method="post" action="album_update.php"  enctype="multipart/form-data">

<input type="hidden" name="no" value="<?=$row[no35]?>">

<table width="500"  bgcolor="#eeeeee" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">번호</td>
    <td width="400" align="left"><?=$no?></td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="20" value="<?=$row[name35]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">사진</td>
    <td width="400" align="left"> 그림이름: <?=$row[image35]?> <br>
      <input type='hidden' name='imagename1' value='<?=$row[image35]?>'>
		<input type="file" name="image" size="20" value="찾아보기">
    </td>
  </tr>
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
		<input type="submit" value="저장"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>