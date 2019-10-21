<?
	include "main_top.php"
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function cart_edit(kind,pos) {
				if (kind=="deleteall") 
				{
					location.href = "cart_edit.php?kind=deleteall";
				} 
				else if (kind=="delete")	{
					location.href = "cart_edit.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>

			<!-- form2 시작  -->
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr>
					<td height="30" align="left"><img src="images/cart_title.gif" width="960" height="30" border="0"></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="960" class="cmfont">
				<tr>
					<td><img src="images/cart_title1.gif" border="0"></td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="960" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="420" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="80"  align="center">가격</td>
					<td width="90"  align="center">합계</td>
					<td width="50"  align="center">삭제</td>
				</tr>
<?
$total=0;
if (!$n_cart) $n_cart = 0; 
for ($i=1;  $i<=$n_cart;  $i++)
{
    if ($cart[$i])
   {
       list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
	   //제품($no), 옵션 ($opts1, $opts2) 정보 알아내기
	   $query="select * from product where no35=$no;";
	   $result=mysqli_query($db,$query);
	   if(!$result) exit("쿼리에러 $query"); // 에러 조사
	   $row=mysqli_fetch_array($result);
	   $count=mysqli_num_rows($result); 

	   $query1 = "select * from opts where no35 = $opts1";
	   $result1=mysqli_query($db,$query1);
	   if(!$result1) exit("쿼리에러 $query1"); // 에러 조사
	   $row1=mysqli_fetch_array($result1);
	   $count1=mysqli_num_rows($result1); 

	   $query2 = "select * from opts where no35 = $opts2";
	   $result2=mysqli_query($db,$query2);
	   if(!$result2) exit("쿼리에러 $query2"); // 에러 조사
	   $row2=mysqli_fetch_array($result2);
	   $count2=mysqli_num_rows($result2); 

	   $price = $row[price35];
       $price_main = $row[price35] - ($row[price35]*($row[discount35]/100));
	   $price_main2 = number_format($price_main);
	   $price_fin =  $price_main * $num;
	   $price_fin2 = number_format($price_fin);
	   $price_save;
	   $price_save = $price_save + $price_fin;
	   echo(" <form name='form2' method='post'>
				<tr>
					<td height='60' align='center' bgcolor='#FFFFFF'>
						<table cellpadding='0' cellspacing='0' width='100%'>
							<tr>
								<td width='60'>
									<a href='product_detail.php?no=$row[no35]'><img src='product/$row[image135]' width='50' height='50' border='0'></a>
								</td>
								<td class='cmfont'>
									<a href='product_detail.php?no=$row[no35]'>$row[name35]</a><br>");
if($opts1) echo("
									<font color='#0066CC'>[옵션1] </font>$row1[name35] &nbsp; ");
if($opts2) echo("
									<font color='#0066CC'>[옵션2] </font>$row2[name35] &nbsp; ");
	   echo("
								</td>
							</tr>
						</table>
					</td>
					<td align='center' bgcolor='#FFFFFF'>
						<input type='text' name='num$i' size='3' value='$num' class='cmfont1'>&nbsp<font color='#464646'>개</font>
					</td>
					<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price_main2</font></td>
					<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price_fin2</font></td>
					<td align='center' bgcolor='#FFFFFF'>
						<a href = 'javascript:cart_edit(\"update\", \"$i\")'><img src='images/b_edit1.gif' border='0'></a>&nbsp<br>
						<a href = 'javascript:cart_edit(\"delete\", \"$i\")'><img src='images/b_delete1.gif' border='0'></a>&nbsp
					</td>
				</tr>
		");
    }
}
?>
				<tr>
					<td colspan="5" bgcolor="#F0F0F0">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr>
								<td bgcolor="#F0F0F0"><img src="images/cart_image1.gif" border="0"></td>
								<td align="right" bgcolor="#F0F0F0">
									<font color="#0066CC"><b>총 합계금액</font></b> : 상품대금(<?=number_format($price_save)?> 원) + 배송료
<?
	
	if ($price_save < $max_baesongbi) { $total = $price_save + $baesongbi;
	$baesongbi = number_format($baesongbi);
	echo("($baesongbi 원)"); }
	else { $total = $price_save; echo("(0원)"); }
?>
									 = <font color="#FF3333"><b><?=number_format($total)?> 원</b></font>&nbsp;&nbsp
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->
			<table width="960" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="44">
					<td width="710" align="center" valign="middle">
						<a href="index.html"><img src="images/b_shopping.gif" border="0"></a>&nbsp;&nbsp;
						<a href="javascript:cart_edit('deleteall', 0)"><img src="images/b_cartalldel.gif" width="103" height="26" border="0"></a>&nbsp;&nbsp;
						<a href="order.php"><img src="images/b_order1.gif" border="0"></a>
					</td>
				</tr>
			</table>
<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php"
?>