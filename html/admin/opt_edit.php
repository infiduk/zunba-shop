<?
	include "../common.php";
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<?
	$query = "select * from opt where no35 = $no;";
	$result = mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	$row = mysqli_fetch_array($result); // 1 레코드 읽기
?>

<form name="form1" method="post" action="opt_update.php">

<input type="hidden" name="no1" value="<?=$row[no35]?>">

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
		<td width="100" height="20" bgcolor="#CCCCCC" align="center">
			<font color="#142712">옵션번호</font>
		</td>
		<td width="400" height="20"  bgcolor="#F2F2F2"><?=$row[no35]?></td>
	</tr>
	<tr> 
		<td width="100" height="20" bgcolor="#CCCCCC" align="center">
			<font color="#142712">옵션명</font>
		</td>
		<td width="400" height="20"  bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row[name35]?>" size="20" maxlength="20">
		</td>
	</tr>
</table>
<br>
<table width="500" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="submit" value="수 정 하 기"> &nbsp;&nbsp
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
