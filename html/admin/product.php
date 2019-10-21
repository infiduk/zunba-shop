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
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="product_new.php";
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<?
  $query = "select * from product order by no35;";
  $result = mysqli_query($db, $query); // sql문 실행
  if(!$result) exit("쿼리에러 $query"); // 에러 조사
  $count = mysqli_num_rows($result); // 레코드 개수
?>

<table width="800" border="0" cellspacing="0" cellpadding="0">
	<form name="form1" method="post" action="product.php">
	<tr height="40">
		<td align="left"  width="150" valign="bottom">&nbsp 제품수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="550" valign="bottom">
<?
if (!$sel1) $sel1 = 0;
if (!$sel2) $sel2 = 0;
if (!$sel3) $sel3 = 0;
if (!$sel4) $sel4 = 1;
if (!$text1) $text1 = ""; 

$k = 0;
if ($sel1 != 0) { $s[$k] = "status35 = " . $sel1;  $k++; }
if ($sel2 == 1) { $s[$k] = "icon_new35 = 1";      $k++; }
else if ($sel2 == 2) { $s[$k] = "icon_hit35 = 1";         $k++; }
else if ($sel2 == 3) { $s[$k] = "icon_sale35 = 1";       $k++; }
if ($sel3 != 0) { $s[$k] = "menu35 = " . $sel3;   $k++; }
if ($text1)
{
    if ($sel4==1) { $s[$k] = "name35 like '%" . $text1 . "%'"; $k++; }
    else if ($sel4 == 2) { $s[$k] = "code35 like '%" . $text1 . "%'"; $k++; }
}

if ($k> 0)
{
    $tmp=implode(" and ", $s); 
    $tmp = " where " . $tmp;
}
$query="select * from product " . $tmp . " order by name35";
$result = mysqli_query($db,$query); 
if (!$result) exit("에러:$query");
$count = mysqli_num_rows($result);    // 레코드개수
// if ($count != 0)

$a_status=array("상품상태","판매중","판매중지","품절");
$n_status=count($a_status);

$a_icon=array("아이콘","New","Hit","Sale");
$n_icon=count($a_icon);

$a_text=array("분류선택","아우터","상의", "셔츠/블라우스", "하의", "스커트/원피스", "트레이닝", "가방/신발", "악세사리");
$n_text=count($a_text);

$a_text1=array("","제품이름","제품번호");   // for문의 $i는 1부터 시작
$n_text1=count($a_text1);

echo("<select name='sel1'>");
for($i=0;$i<$n_status;$i++)
{
    if ($i==$sel1)
       echo("<option value='$i' selected>$a_status[$i]</option>");
    else
       echo("<option value='$i'>$a_status[$i]</option>");
}
echo("</select> &nbsp
<select name='sel2'>");
for($i=0;$i<$n_icon;$i++)
{
    if ($i==$sel2)
       echo("<option value='$i' selected>$a_icon[$i]</option>");
    else
       echo("<option value='$i'>$a_icon[$i]</option>");
}
echo("</select> &nbsp
<select name='sel3'>");
for($i=0;$i<$n_text;$i++)
{
    if ($i==$sel3)
       echo("<option value='$i' selected>$a_text[$i]</option>");
    else
       echo("<option value='$i'>$a_text[$i]</option>");
}
echo("</select> &nbsp
<select name='sel4'>");
for($i=1;$i<$n_text1;$i++)
{
    if ($i==$sel4)
       echo("<option value='$i' selected>$a_text1[$i]</option>");
    else
       echo("<option value='$i'>$a_text1[$i]</option>");
}
echo("</select> &nbsp");
?>
			<input type="text" name="text1" size="10" value="<?=$text1?>"> &nbsp
		</td>
		<td align="left" width="120" valign="bottom">
			<input type="button" value="검색" onclick="javascript:form1.submit();">&nbsp
			<input type="button" value="입력" onclick="javascript:go_new();">
		</td>
	</tr>
	<tr><td height="5"></td></tr>
	</form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="100" align="center">제품분류</td>
		<td width="100" align="center">제품코드</td>
		<td width="280" align="center">제품명</td>
		<td width="70"  align="center">판매가</td>
		<td width="70"  align="center">상태</td>
		<td width="120" align="center">이벤트</td>
		<td width="80"  align="center">수정/삭제</td>
	</tr>
<?
if(!$text1) {
    $query = "select * from product order by no35;";

	if($sel1==1) $query = "select * from product where status35 = 1 order by no35;";
	if($sel1==2) $query = "select * from product where status35 = 2 order by no35;";
	if($sel1==3) $query = "select * from product where status35 = 3 order by no35;";

	if($sel2==1) $query = "select * from product where icon_new35 = 1 order by no35;";
	if($sel2==2) $query = "select * from product where icon_hit35 = 1 order by no35;";
	if($sel2==3) $query = "select * from product where icon_sale35 = 1 order by no35;";

	if($sel3==1) $query = "select * from product where menu35 = 1 order by no35;";
	if($sel3==2) $query = "select * from product where menu35 = 2 order by no35;";
	if($sel3==3) $query = "select * from product where menu35 = 3 order by no35;";
	if($sel3==4) $query = "select * from product where menu35 = 4 order by no35;";
	if($sel3==5) $query = "select * from product where menu35 = 5 order by no35;";
	if($sel3==6) $query = "select * from product where menu35 = 6 order by no35;";
	if($sel3==7) $query = "select * from product where menu35 = 7 order by no35;";
	if($sel3==8) $query = "select * from product where menu35 = 8 order by no35;";
}
else {
	if ($sel4 == 1) {
		$query = "select * from product where name35 like '%$text1%' order by name35;";
	
	if($sel1==1) $query = "select * from product where status35 = 1 and name35 like '%$text1%' order by name35;";
	if($sel1==2) $query = "select * from product where status35 = 2 and name35 like '%$text1%' order by name35;";
	if($sel1==3) $query = "select * from product where status35 = 3 and name35 like '%$text1%' order by name35;";

	if($sel2==1) $query = "select * from product where icon_new35 = 1 and name35 like '%$text1%' order by name35;";
	if($sel2==2) $query = "select * from product where icon_hit35 = 1 and name35 like '%$text1%' order by name35;";
	if($sel2==3) $query = "select * from product where icon_sale35 = 1 and name35 like '%$text1%' order by name35;";

	if($sel3==1) $query = "select * from product where menu35 = 1 and name35 like '%$text1%' order by name35;";
	if($sel3==2) $query = "select * from product where menu35 = 2 and name35 like '%$text1%' order by name35;";
	if($sel3==3) $query = "select * from product where menu35 = 3 and name35 like '%$text1%' order by name35;";
	if($sel3==4) $query = "select * from product where menu35 = 4 and name35 like '%$text1%' order by name35;";
	if($sel3==5) $query = "select * from product where menu35 = 5 and name35 like '%$text1%' order by name35;";
	if($sel3==6) $query = "select * from product where menu35 = 6 and name35 like '%$text1%' order by name35;";
	if($sel3==7) $query = "select * from product where menu35 = 7 and name35 like '%$text1%' order by name35;";
	if($sel3==8) $query = "select * from product where menu35 = 8 and name35 like '%$text1%' order by name35;";
	}

	else {
		$query = "select * from product where code35 like '%$text1%' order by code35;";

	if($sel1==1) $query = "select * from product where status35 = 1 and code35 like '%$text1%' order by no35;";
	if($sel1==2) $query = "select * from product where status35 = 2 and code35 like '%$text1%' order by no35;";
	if($sel1==3) $query = "select * from product where status35 = 3 and code35 like '%$text1%' order by no35;";

	if($sel2==1) $query = "select * from product where icon_new35 = 1 and code35 like '%$text1%' order by no35;";
	if($sel2==2) $query = "select * from product where icon_hit35 = 1 and code35 like '%$text1%' order by no35;";
	if($sel2==3) $query = "select * from product where icon_sale35 = 1 and code35 like '%$text1%' order by no35;";

	if($sel3==1) $query = "select * from product where menu35 = 1 and code35 like '%$text1%' order by no35;";
	if($sel3==2) $query = "select * from product where menu35 = 2 and code35 like '%$text1%' order by no35;";
	if($sel3==3) $query = "select * from product where menu35 = 3 and code35 like '%$text1%' order by no35;";
	if($sel3==4) $query = "select * from product where menu35 = 4 and code35 like '%$text1%' order by no35;";
	if($sel3==5) $query = "select * from product where menu35 = 5 and code35 like '%$text1%' order by no35;";
	if($sel3==6) $query = "select * from product where menu35 = 6 and code35 like '%$text1%' order by no35;";
	if($sel3==7) $query = "select * from product where menu35 = 7 and code35 like '%$text1%' order by no35;";
	if($sel3==8) $query = "select * from product where menu35 = 8 and code35 like '%$text1%' order by no35;";
	}
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

	  if ($row[status35]==1)  $status=$a_status[1];
	  else if ($row[status35]==2) $status=$a_status[2];
	  else if ($row[status35]==3) $status=$a_status[3];

	  $price = number_format($row[price35]);

	  $event = "($row[discount35]%)";

	  $menu = $row[menu35];

	  echo("<tr bgcolor='lightyellow'>
	  <td align = 'center'>&nbsp $a_text[$menu]</td>
	  <td align = 'center'>&nbsp $row[code35]</td>
	  <td align = 'center'>&nbsp $row[name35]</td>
	  <td align = 'center'>&nbsp $price</td>
	  <td align = 'center'>&nbsp $status</td>
	  <td align = 'center'>");
	  if($row[icon_new35] == 1) echo("New");
	  if($row[icon_hit35] == 1) echo(" Hit");
	  if($row[icon_sale35] == 1) echo(" Sale");
	  echo("$event</td>
	  <td align = 'center'><a href='product_edit.php?no=$row[no35]&sel1=$sel1&sel2=$sel2&sel3=$sel3&
       sel4=$sel4&text1=$text1&page=$page'>수정</a>/<a href='product_delete.php?no=$row[no35]&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page' onclick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
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
		echo("<a href = 'product.php?page=$tmp&text1=$text1&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4'><img src = 'images/i_prev.gif' align = 'absmiddle' border '0'></a>&nbsp;");
	}
	for($i = $page_s + 1; $i <= $page_e; $i++)
	{
		if($page == $i)
			echo("<font color = 'red'><b>$i</b></font>&nbsp");
		else 
			echo("<a href = 'product.php?page=$i&text1=$text1&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4'>[$i]</a>&nbsp");
	}
	if($block < $blocks)
	{
		$tmp = $page_e + 1;
		echo("&nbsp<a href = 'product.php?page=$tmp&text1=$text1&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4'><img src = 'images/i_next.gif' align = 'absmiddle' border = '0'></a>");
	}
	echo("</td></tr></table>");
?>
</center>

</body>
</html>