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

<table width="500" border="0">
	<form name="form1" method="post" action="album.html">
	<tr>
		<td align="right"><a href="album_new.php">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<?
  $query = "select * from album order by no35;";
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수
?>

<table width="500"border="0">
	<tr>
<?
  $query = "select * from album order by no35;";
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수

  $num_col=3; $num_row=2;                // column수, row수
  $page_line=$num_col*$num_row;       // 1페이지에 출력할 제품수
  $icount=0;

  if(!$page) $page = 1;
  $pages = ceil($count / $page_line);
  $first = 1;
  if($count > 0) $first = $page_line * ($page - 1);
  $page_last = $count - $first;
  if($page_last > $page_line) $page_last = $page_line;
  if($count > 0) mysqli_data_seek($result, $first);

echo("<table>");
for ($ir=0;  $ir<$num_row;  $ir++)
{
     echo("<tr>");
     for ($ic=0;  $ic<$num_col;  $ic++)
     {

          if ($icount <= $page_last-1 )
         {
              $row=mysqli_fetch_array($result);
			  if(!$row[image35]) $row[image35]="noimage.jpg";

              echo("<td width='150' align='center'>
			<table class='mytable'>
				<tr><td align='center'><img src='../album/picture/$row[image35]' width='150' height='100'></td></tr>
				<tr><td align='center'>$row[name35]</td></tr>
				<tr>
					<td width='100' align='center'>
						<a href='album_edit.php?no=$row[no35]'>수정</a> / 
						<a href='album_delete.php?no=$row[no35]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
					</td>
				</tr>
			</table>
		</td>");
         }
         else
              echo("<td></td>");
         $icount++;
      }
      echo("</tr>");
}
echo("</table>");
?>
		<td width="150" align="center">
		</td>
	</tr>
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
		echo("<a href = 'album.php?menu=1&sort=1&page=$i'><img src = '../ images/i_prev.gif' align = 'absmiddle' border '0'></a>&nbsp;");
	}
	for($i = $page_s + 1; $i <= $page_e; $i++)
	{
		if($page == $i)
			echo("<font color = 'red'><b>$i</b></font>&nbsp");
		else 
			echo("<a href = 'album.php?menu=1&sort=1&page=$i'>[$i]</a>&nbsp");
	}
	if($block < $blocks)
	{
		$tmp = $page_e + 1;
		echo("&nbsp<a href = 'album.php?menu=1&sort=1&page=$i'><img src = '../images/i_next.gif' align = 'absmiddle' border = '0'></a>");
	}
	echo("</td></tr></table>");
?>
</body>
</html>
