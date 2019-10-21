<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->	

<?
  include "common.php";
?>

<html>
<head>
	<title>주소록 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="600" border="0">
	<form name="form1" method="post" action="juso_list.php">
	<tr>
		<td width="400">&nbsp
			이름 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="juso_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="600" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="70"  align="center">이름</td>
    <td width="120"  align="center">전화</td>
    <td width="40"  align="center">음/양</td>
    <td width="100"  align="center">생일</td>
    <td width="280" align="center">주소</td>
    <td width="50"  align="center">삭제</td>
  </tr>

<?
  if(!$text1)
    $query = "select * from juso order by name35;";
  else
    $query = "select * from juso where name35 like '$text1%' order by name35;";
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

	  $tel1=trim(substr($row[tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
      $tel2=trim(substr($row[tel35],3,4));        // 3번 위치에서 4자리
      $tel3=trim(substr($row[tel35],7,4));        // 7번 위치에서 4자리

	  $tel = $tel1. "-". $tel2. "-". $tel3;

	  echo("<tr bgcolor='lightyellow'>
	  <td align = 'center'>&nbsp <a href = 'juso_edit.php?no=$row[no35]'> $row[name35]</a></td>
	  <td align = 'center'>&nbsp $tel</td>
	  <td align = 'center'>&nbsp $sm</td>
	  <td align = 'center'>&nbsp $row[birthday35]</td>
	  <td align = 'center'>&nbsp $row[juso35]</td>
	  <td align = 'center'><a href = 'juso_delete.php?no=$row[no35]' onClick = 'javascript:return confirm(\"삭제할까요?\");'>삭제</a></td>
	  </tr>");
  }
  ?>
<!--
  <tr bgcolor="lightyellow">
    <td width="70"  align="center"><a href="juso_edit.html?no=1">김길동</a></td>
    <td width="100"  align="center">022-111-1111</td>
    <td width="50"  align="center">양력</td>
    <td width="80"  align="center">1990-01-01</td>
    <td width="250" align="left">서울 노원구 초안산로길 인덕대학</td>
    <td width="50"  align="center">
		<a href="juso_delete.html?no=1" onClick="javascript:return confirm('삭제할까요 ?');">삭제</a>
	</td>
  </tr>
  <tr bgcolor="lightyellow">
    <td width="70"  align="center"><a href="juso_edit.html?no=2">이길동</a></td>
    <td width="100"  align="center">02 -222-2222</td>
    <td width="50"  align="center">음력</td>
    <td width="80"   align="center">1990-01-01</td>
    <td width="250" align="left">서울 노원구 초안산로길 인덕아파트</td>
    <td width="50"  align="center">
			<a href="juso_delete.html?no=2" onClick="javascript:return confirm('삭제할까요 ?');">삭제</a>
		</td>
  </tr>
</table>
-->
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
		echo("<a href = 'juso_list.php?page=$tmp&text1=$text1'><img src = 'images/i_prev.gif' align = 'absmiddle' border '0'></a>&nbsp;");
	}
	for($i = $page_s + 1; $i <= $page_e; $i++)
	{
		if($page == $i)
			echo("<font color = 'red'><b>$i</b></font>&nbsp");
		else 
			echo("<a href = 'juso_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if($block < $blocks)
	{
		$tmp = $page_e + 1;
		echo("&nbsp<a href = 'juso_list.php?page=$tmp&text1=$text1'><img src = 'images/i_next.gif' align = 'absmiddle' border = '0'></a>");
	}
	echo("</td></tr></table>");
?>
<!--
<table width="600" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="juso_list.php?page=2&text1="><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="juso_list.php?page=3&text1="><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>
-->
</body>
</html>
