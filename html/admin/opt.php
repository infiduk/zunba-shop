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
<script>
	function go_new()
	{
		location.href="opt_new.php";
	}
</script>
</head>

<body style="margin:0">

<center>
<br>
<script> document.write(menu());</script>

<?
  $query = "select * from opt order by no35;";
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수
?>

<table width="500" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left"  width="250" height="50" valign="bottom">&nbsp 옵션수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="250" height="50" valign="bottom">
			<input type="button" value="신규입력" onclick="javascript:go_new();"> &nbsp
		</td>
	</tr>
	<tr><td height="5" colspan="2"></td></tr>
</table>

<table width="500" border="1" cellpadding="2"  style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="20"> 
		<td width="50"  align="center"><font color="#142712">번호</font></td>
		<td width="250" align="center"><font color="#142712">옵션명</font></td>
		<td width="100" align="center"><font color="#142712">수정/삭제</font></td>
		<td width="100" align="center"><font color="#142712">소옵션편집</font></td>
	</tr>

<?
  if(!$page) $page = 1;
  $pages = ceil($count / $page_line);
  $first = 1;
  if($count > 0) $first = $page_line * ($page - 1);
  $page_last = $count - $first;
  if($page_last > $page_line) $page_last = $page_line;
  if($count > 0) mysqli_data_seek($result, $first);

  for($i = 0; $i < $count; $i++)
  {
	  $row = mysqli_fetch_array($result);
	  echo("<tr bgcolor='lightyellow'>
	  <td align = 'center'>&nbsp $row[no35]</td>
	  <td align = 'center'>&nbsp $row[name35]</td>
	  <td align = 'center'><a href = 'opt_edit.php?no=$row[no35]' onClick = 'javascript:return confirm(\"수정할까요?\");'>수정</a>/<a href = 'opt_delete.php?no=$row[no35]' onClick = 'javascript:return confirm(\"삭제할까요?\");'>삭제</a></td>
	  <td align = 'center'><a href = 'opts.php?no1=$row[no35]'>소옵션편집</a></td></tr>");
  }
?>
</table>

<br>
</center>

</body>
</html>