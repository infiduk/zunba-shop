<?
	include "main_top.php"
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

      <!-- 하위 상품목록 -->
			<!-- form2 시작 -->
			<form name="form2" method="post" action="product.php">
			<input type="hidden" name="menu" value="<?=$menu?>">

			<table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#efefef">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="960" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
												<font color="#C83762" class="cmfont"><b>
<?
  if($menu == 1) echo("아우터");
  if($menu == 2) echo("상의");
  if($menu == 3) echo("셔츠/블라우스");
  if($menu == 4) echo("하의");
  if($menu == 5) echo("스커트/원피스");
  if($menu == 6) echo("트레이닝");
  if($menu == 7) echo("가방/신발");
  if($menu == 8) echo("악세사리");

$query="select * from product where menu35=$menu order by name35;";
$result=mysqli_query($db,$query);
$count=mysqli_num_rows($result);  
?>
												&nbsp</b></font>&nbsp
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="100">
															<select name="sort" size="1" class="cmfont" onChange="form2.submit()">
<?
if ($sort=="up")            // 고가격순
   $query="select * from product where menu35=$menu order by price35 desc";
else if ($sort=="down")  // 저가격순
   $query="select * from product where menu35=$menu order by price35";
else if ($sort=="name")  // 이름순
   $query="select * from product where menu35=$menu order by name35";
else                              // 신상품순
   $query="select * from product where menu35=$menu order by no35 desc";
?>
<?
if($sort == "new") echo("<option value='new' selected> 신상품순 정렬</option>");
else echo("<option value='new'> 신상품순 정렬</option>");
if($sort == "up") echo("<option value='up' selected> 고가격순 정렬</option>");
else echo("<option value='up'> 고가격순 정렬</option>");
if($sort == "down") echo("<option value='down' selected> 저가격순 정렬</option>");
else echo("<option value='down'> 저가격순 정렬</option>");
if($sort == "name") echo("<option value='name' selected> 이름순 정렬</option>");
else echo("<option value='name'> 이름순 정렬</option>");
?>
															</select>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 -->

<?
// $query="select * from product where menu35=$menu order by name35;";
$result=mysqli_query($db,$query);
$num_col=5; $num_row=4;                // column수, row수
$count=mysqli_num_rows($result); 
$page_line=$num_col*$num_row;       // 1페이지에 출력할 제품수
$icount=0;
if(!$result) exit("쿼리에러 $query"); // 에러 조사

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

			 $price = number_format($row[price35]);
			 $price_main = number_format($row[price35] - ($row[price35]*($row[discount35]/100)));

              echo("<td width='200' height='225' align='center' valign='top'>
						<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'> &nbsp;
							<tr> 
								<td align='center'> 
									<a href='product_detail.php?no=$row[no35]'><img src='product/$row[image135]' width='180' height='200' border='0'></a>
								</td>
							</tr>
							<tr><td height='5'></td></tr>
							<tr> 
								<td height='20' align='center'>
									<a href='product_detail.php?no=1'><font color='444444'>$row[name35]</font></a>&nbsp;");
  if($row[icon_new35] == 1) echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'> &nbsp;");
  if($row[icon_hit35] == 1) echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'> &nbsp;");
  if($row[icon_sale35] == 1) echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>");
								echo("</td>
							</tr>");
	if($row[icon_sale35] == 0) echo("<tr><td height='20' align='center'><b>$price 원");
	else echo("<tr><td height='20' align='center'><font color = 'red'>$row[discount35]% &nbsp; </font><b><strike>$price</strike> &nbsp; $price_main 원");
	echo("</b></td></tr>
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

<?
  $blocks = ceil($pages / $page_block);
  $block = ceil($page / $page_block);
  $page_s = $page_block * ($block - 1);
  $page_e = $page_block * $block;
  if($blocks <= $block) $page_e = $pages;

  echo("<table width = '960' border = '0'>
  <tr>
    <td height = '20' align = 'center'>");
	if($block > 1)
	{
		$tmp = $page_s;
		echo("<a href = 'product.php?menu=1&sort=1&page=i'><img src = 'images/i_prev.gif' align = 'absmiddle' border '0'></a>&nbsp;");
	}
	for($i = $page_s + 1; $i <= $page_e; $i++)
	{
		if($page == $i)
			echo("<font color = 'red'><b>$i</b></font>&nbsp");
		else 
			echo("<a href = 'product.php?menu=1&sort=1&page=i'>[$i]</a>&nbsp");
	}
	if($block < $blocks)
	{
		$tmp = $page_e + 1;
		echo("&nbsp<a href = 'product.php?menu=1&sort=1&page=i'><img src = 'images/i_next.gif' align = 'absmiddle' border = '0'></a>");
	}
	echo("</td></tr></table>");
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php"
?>