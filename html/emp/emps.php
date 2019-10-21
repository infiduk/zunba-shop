<?
	include "../common.php";
?>
<html>
<head>
	<title>직원 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>
<body>

<input type="hidden" name="no1" value="">

<?
  $query = "select name35 from emp where no35 = $no1;";
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수
  $row = mysqli_fetch_array($result);
?>

<table width="500" border="0">
	<tr>
		<td align="left"  width="300" valign="bottom">
			직원이름 : <b><?=$row[name35]?></b>
		</td>
		<td align="right" width="200" valign="bottom">
			<a href="emps_new.php?no1=<?=$no1?>">신규입력</a>
		</td>
	</tr>
</table>

<table width="500" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="100" align="center">가족이름</td>
    <td width="100" align="center">가족생일</td>
    <td width="100" align="center">수정/삭제</td>
  </tr>

<?
  $query = "select * from emps where emp_no35 = $no1 order by name35;";
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

  for($i = 0; $i < $count; $i++)
  {
	  $row = mysqli_fetch_array($result);

	  $birthday1=substr($row[birthday35],0,4);
	  $birthday2=substr($row[birthday35],5,2);
	  $birthday3=substr($row[birthday35],8,2);

	  $birthday = $birthday1. "-". $birthday2. "-". $birthday3;

	  echo("<tr bgcolor='lightyellow'>
    <td width='100' align='center'>$row[name35]</td>
    <td width='100' align='center'>$birthday</td>
    <td width='100' align='center'>
		<a href='emps_edit.php?no1=$row[emp_no35]&no2=$row[no35]'>수정</a> / 
		<a href='emps_delete.php?no1=$row[emp_no35]&no2=$row[no35]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
	</td>
  </tr>");
  }
?>
</table>

</body>
</html>
