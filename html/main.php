<?
	include "main_top2.php"
	
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

<table width="960" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2"><a href="product.php?menu=1"><img src="images/b_left01.jpg" width="604"></a></td>
		<td rowspan="2"><a href="product.php?menu=3"><img src="images/b_right01.gif" width="358" height="560"></a></td>
	</tr>
	<tr>
		<!--<td><img src="images/zunbashop_main_image0.png" width="182" height="500"></td>-->
		<td><a href="product.php?menu=2"><img src="images/b_left02.jpg" width="300"></a></td>
		<td><a href="product.php?menu=2"><img src="images/b_left03.jpg" width="300"></a></td>
	</tr>
</table>

			<!---- 화면 우측(신상품) 시작 -------------------------------------------------->	

			<table width="960" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="60">
						<img src="images/main_newproduct.gif" width="980" height="90">
					</td>
				</tr>
			</table>

<?
$query="select * from product where icon_new35=1 and status35=1 order by rand() limit 15;";
$result=mysqli_query($db,$query);
$num_col=5;   $num_row=3;                   // column수, row수
$count=mysqli_num_rows($result);           // 출력할 제품 개수
$icount=0;       // 출력한 제품개수 카운터
if(!$result) exit("쿼리에러 $query"); // 에러 조사

echo("<table>");
for ($ir=0; $ir<$num_row; $ir++)
{
     echo("<tr>");
     for ($ic=0;  $ic<$num_col;  $ic++)
    {
         if ($icount < $count)
        {
             $row=mysqli_fetch_array($result);

			 $price = number_format($row[price35]);
			 $price_main = $row[price35] - ($row[price35]*($row[discount35]/100));

             echo("<td width='200' height='225' align='center' valign='top'>
						<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
							<tr> 
								<td align='center'> 
									<a href='product_detail.php?no=$row[no35]'><img src='product/$row[image135]' width='180' height='200' border='0'></a>
								</td>
							</tr>
							<tr><td height='5'></td></tr>
							<tr> 
								<td height='20' align='center'>
									<a href='product_detail.php?no=1'><font color='444444'>$row[name35]</font></a>&nbsp; <img src='images/i_new.gif' align='absmiddle' vspace='1'>");
  if($row[icon_hit35] == 1) echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
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
             echo("<td></td>");      // 제품 없는 경우
         $icount++;
     }
    echo("</tr>");
}
echo("</table>");
?>

			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php"
?>