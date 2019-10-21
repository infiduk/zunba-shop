<?
  include "../common.php";
?>

<html>
<head>
	<title>직원 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>
<body>
<table width="500" border="0">
	<form name="form1" method="post" action="emp.php">
	<tr>
		<td width="300">
			이름 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="emp_new.php">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<?
  if(!$text1)
    $query = "select * from emp order by name35;";
  else
    $query = "select * from emp where name35 like '$text1%' order by name35;";
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수
?>

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">이름</td>
    <td width="100" align="center">전화</td>
    <td width="100" align="center">수정/삭제</td>
    <td width="100" align="center">가족</td>
  </tr>

<?
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

	  $tel1=trim(substr($row[tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
	  $tel2=trim(substr($row[tel35],3,4));        // 3번 위치에서 4자리
	  $tel3=trim(substr($row[tel35],7,4));        // 7번 위치에서 4자리

	  $tel = $tel1. "-". $tel2. "-". $tel3;

	  echo("<tr bgcolor='lightyellow'>
    <td width='100' align='center'>$row[name35]</td>
    <td width='100' align='center'>$tel</td>
    <td width='100' align='center'>
		<a href='emp_edit.php?no=$row[no35]'>수정</a> / 
		<a href='emp_delete.php?no=$row[no35]' onClick='javascript:return confirm(\"삭제할까요?\");'>삭제</a></td>
    <td width='100' align='center'>
		<a href='emps.php?no1=$row[no35]'>가족편집</a>
	</td>
  </tr>");
  }
?>

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
		echo("<a href = 'emp.php?page=$tmp&text1=$text1'><img src = 'images/i_prev.gif' align = 'absmiddle' border '0'></a>&nbsp;");
	}
	for($i = $page_s + 1; $i <= $page_e; $i++)
	{
		if($page == $i)
			echo("<font color = 'red'><b>$i</b></font>&nbsp");
		else 
			echo("<a href = 'emp.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if($block < $blocks)
	{
		$tmp = $page_e + 1;
		echo("&nbsp<a href = 'emp.php?page=$tmp&text1=$text1'><img src = 'images/i_next.gif' align = 'absmiddle' border = '0'></a>");
	}
	echo("</td></tr></table>");
?>
</body>
</html>