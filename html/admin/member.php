<?
	include "../common.php";
	//if (!$cookie_admin) echo("<script>location.href = 'index.html'</script>"); 
?>

<!-------------------------------------------------------------------------------------------->
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->
<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<?
  $query = "select * from member order by no35;";
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수
?>

<table width="800" border="0">
	<form name="form1" method="post" action="member.php">
	<tr height="40">
		<td width="200" valign="bottom">&nbsp 회원수 : <font color="#FF0000"><?=$count?></font></td>
		<td width="540" align="right" valign="bottom">
<?			
			echo("<select name='sel1'>");
			for ($i=0; $i<2; $i++)
			{
				if ($sel1==$i)
					echo("<option value='$i' selected>$a_idname[$i]</option>");
				else
					echo("<option value='$i'>$a_idname[$i]</option>");
			}
			echo("</select>");
?>
			<input type="text" name="text1" size="15" value="<?=$text1?>" class="font9">&nbsp
		</td>
		<td width="60" valign="bottom">
			<input type="button" value="검색" onclick="javascript:form1.submit();">&nbsp
		</td>
	</tr>
	</form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23">
		<td width="100" align="center">ID</td>
		<td width="100" align="center">이름</td>
		<td width="100" align="center">전화</td>
		<td width="100" align="center">핸드폰</td>
		<td width="200" align="center">E-Mail</td>
		<td width="100" align="center">회원구분</td>
		<td width="100" align="center">수정/삭제</td>
	</tr>
<?
  if(!$text1)
    $query = "select * from member order by no35;";
  else {
	  if ($sel1==1)
		  $query = "select * from member where uid35 like '$text1%' order by uid35;";
	  else
		  $query = "select * from member where name35 like '$text1%' order by name35;";
  }
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수

  if(!$page) $page = 1;
  $pages = ceil($count / $page_line);
  $first = 1;
  if($count > 0) $first = $page_line * ($page - 1);
  $page_last = $count - $first;
  if($page_last > $page_line) $page_last = $page_line;
  if($count > 0) mysqli_data_seek($result, $first);

  for($i = 0; $i < $page_last; $i++)
  {
	  $row = mysqli_fetch_array($result);
	  if ($row[sm35]==0)  $sm="양력";  else   $sm="음력";
	  if ($row[gubun35]==0)  $gubun="회원";  else   $gubun="탈퇴";

	  $tel1=trim(substr($row[tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
      $tel2=trim(substr($row[tel35],3,4));        // 3번 위치에서 4자리
      $tel3=trim(substr($row[tel35],7,4));        // 7번 위치에서 4자리

	  $tel = $tel1. "-". $tel2. "-". $tel3;

	  $phone1=trim(substr($row[phone35],0,3));        // 0번 위치에서 3자리 문자열 추출
	  $phone2=trim(substr($row[phone35],3,4));        // 3번 위치에서 4자리
	  $phone3=trim(substr($row[phone35],7,4));        // 7번 위치에서 4자리

	  $phone = $phone1. "-". $phone2. "-". $phone3;

	  echo("<tr bgcolor='lightyellow'>
	  <td align = 'center'>&nbsp <a href='member_edit.php?no=$row[no35]&page=$page&sel1=$sel1&text1=$text1'> $row[uid35]</a></td>
	  <td align = 'center'>&nbsp $row[name35]</td>
	  <td align = 'center'>&nbsp $tel</td>
	  <td align = 'center'>&nbsp $phone</td>
	  <td align = 'center'>&nbsp $row[email35]</td>
	  <td align = 'center'>&nbsp $gubun</td>
	  <td align = 'center'><a href = 'member_edit.php?no=$row[no35]' onClick = 'javascript:return confirm(\"수정할까요?\");'>수정</a>/<a href = 'member_delete.php?no=$row[no35]' onClick = 'javascript:return confirm(\"삭제할까요?\");'>삭제</a></td>
	  </tr>");
  }
?>
  </table>

<?
  $blocks = ceil($pages / $page_block);
  $block = ceil($page / $page_block);
  $page_s = $page_block * ($block - 1);
  $page_e = $page_block * $block;
  if($blocks <= $block) $page_e = $pages;

  echo("<table width = '400' border = '0'>
  <tr>
    <td height = '20' align = 'center'>");
	if($block > 1)
	{
		$tmp = $page_s;
		echo("<a href = 'member.php?page=$tmp&text1=$text1'><img src = 'images/i_prev.gif' align = 'absmiddle' border '0'></a>&nbsp;");
	}
	for($i = $page_s + 1; $i <= $page_e; $i++)
	{
		if($page == $i)
			echo("<font color = 'red'><b>$i</b></font>&nbsp");
		else 
			echo("<a href = 'member.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if($block < $blocks)
	{
		$tmp = $page_e + 1;
		echo("&nbsp<a href = 'member.php?page=$tmp&text1=$text1'><img src = 'images/i_next.gif' align = 'absmiddle' border = '0'></a>");
	}
	echo("</td></tr></table>");
?>
<!--
<table width="800" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" class="cmfont" align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0">
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="member.html?page=2&sel1=&text1="><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="member.html?page=3&sel1=&text1="><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>
-->
</center>

</body>
</html>