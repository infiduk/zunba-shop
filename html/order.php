<?
	include "main_top.php"
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">

			function Check_Value() {
				if (!form2.o_name.value) {
					alert("주문자 이름이 잘 못 되었습니다.");	form2.o_name.focus();	return;
				}
				if (!form2.o_tel1.value || !form2.o_tel2.value || !form2.o_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.o_tel1.focus();	return;
				}
				if (!form2.o_phone1.value || !form2.o_phone2.value || !form2.o_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.o_phone1.focus();	return;
				}
				if (!form2.o_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.o_email.focus();	return;
				}
				if (!form2.o_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.o_zip.focus();	return;
				}
				if (!form2.o_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.o_juso.focus();	return;
				}

				if (!form2.r_name.value) {
					alert("받으실 분의 이름이 잘 못 되었습니다.");	form2.r_name.focus();	return;
				}
				if (!form2.r_tel1.value || !form2.r_tel2.value || !form2.r_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.r_tel1.focus();	return;
				}
				if (!form2.r_phone1.value || !form2.r_phone2.value || !form2.r_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.r_phone1.focus();	return;
				}
				if (!form2.r_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.r_email.focus();	return;
				}
				if (!form2.r_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.r_zip.focus();	return;
				}
				if (!form2.r_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.r_juso.focus();	return;
				}

				form2.submit();
			}

			function FindZip(zip_kind) 
			{
				window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=500,height=250");
			}

			function SameCopy(str) {
				if (str == "Y") {
					form2.r_name.value = form2.o_name.value;
					form2.r_zip.value = form2.o_zip.value;
					form2.r_juso.value = form2.o_juso.value;
					form2.r_tel1.value = form2.o_tel1.value;
					form2.r_tel2.value = form2.o_tel2.value;
					form2.r_tel3.value = form2.o_tel3.value;
					form2.r_phone1.value = form2.o_phone1.value;
					form2.r_phone2.value = form2.o_phone2.value;
					form2.r_phone3.value = form2.o_phone3.value;
					form2.r_email.value = form2.o_email.value;
				}
				else {
					form2.r_name.value = "";
					form2.r_zip.value = "";
					form2.r_juso.value = "";
					form2.r_tel1.value = "";
					form2.r_tel2.value = "";
					form2.r_tel3.value = "";
					form2.r_phone1.value = "";
					form2.r_phone2.value = "";
					form2.r_phone3.value = "";
					form2.r_email.value = "";
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="960" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="960">
				<tr>
					<td><img src="images/order_title1.gif" width="65" height="15" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="960" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="440" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="100" align="center">가격</td>
					<td width="100" align="center">합계</td>
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

	   echo("	<tr>
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
			<br><br>

<?

  $o_no="0"; $o_name=""; $o_tel1=""; $o_tel2=""; $o_tel3=""; $o_phone1=""; $o_phone2=""; $o_phone3=""; $o_email=""; $o_zip=""; $o_juso="";
 //  $r_name=""; $r_tel=""; $r_phone=""; $r_email=""; $r_zip=""; $r_juso=""; $memo="";

  if($cookie_no) {
	$query="select * from member where no35=$cookie_no;";
	$result=mysqli_query($db,$query);
	if(!$result) exit("쿼리에러 $query"); // 에러 조사
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result); 	
	
	$o_tel1=trim(substr($row[tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
	$o_tel2=trim(substr($row[tel35],3,4));        // 3번 위치에서 4자리
	$o_tel3=trim(substr($row[tel35],7,4));        // 7번 위치에서 4자리

	$o_phone1=trim(substr($row[phone35],0,3));        // 0번 위치에서 3자리 문자열 추출
	$o_phone2=trim(substr($row[phone35],3,4));        // 3번 위치에서 4자리
	$o_phone3=trim(substr($row[phone35],7,4));        // 7번 위치에서 4자리

	$o_no=$row[no35]; $o_name=$row[name35]; $o_email=$row[email35]; $o_zip=$row[zip35]; $o_juso=$row[juso35];
  }

?>
			<!-- 주문자 정보 -->
			<table width="960" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
			</table>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="order_pay.php">
			<table width="960" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
						<font size="2" color="#B90319"><b>주문자 정보</b></font>
					</td>
					<td align="center" width="960">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>주문자 성명</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="hidden" name="o_no" value="<?=$o_no?>">
									<input type="text"   name="o_name" size="20" maxlength="10" value="<?=$o_name?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>전화번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_tel1" size="4" maxlength="4" value="<?=$o_tel1?>" class="cmfont1"> -
									<input type="text" name="o_tel2" size="4" maxlength="4" value="<?=$o_tel2?>" class="cmfont1"> -
									<input type="text" name="o_tel3" size="4" maxlength="4" value="<?=$o_tel3?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>휴대폰번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_phone1" size="4" maxlength="4" value="<?=$o_phone1?>" class="cmfont1"> -
									<input type="text" name="o_phone2" size="4" maxlength="4" value="<?=$o_phone2?>" class="cmfont1"> -
									<input type="text" name="o_phone3" size="4" maxlength="4" value="<?=$o_phone3?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>E-Mail</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_email" size="50" maxlength="50" value="<?=$o_email?>" class="cmfont1">
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>주소</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_zip" size="5" maxlength="5" value="<?=$o_zip?>" class="cmfont1"> 
									<a href="javascript:FindZip(1)"><img src="images/b_zip.gif" align="absmiddle" border="0"></a> <br>
									<input type="text" name="o_juso" size="55" maxlength="200" value="<?=$o_juso?>" class="cmfont1"><br>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<!-- 배송지 정보 -->
			<table width="960" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="960" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5"><font size=2 color="#B90319"><b>배송지 정보</b></font></td>
					<td align="center" width="960">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>주문자정보와 동일</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="radio" name="same" onclick="SameCopy('Y')">예 &nbsp;
									<input type="radio" name="same" onclick="SameCopy('N')">아니오
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>받으실 분 성명</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_name" size="20" maxlength="10" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>전화번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_tel1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>휴대폰번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_phone1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>E-Mail</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_email" size="50" maxlength="50" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>주소</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_zip" size="5" maxlength="5" value="" class="cmfont1"> 
									<a href="javascript:FindZip(2)"><img src="images/b_zip.gif" align="absmiddle" border="0"></a> <br>
									<input type="text" name="r_juso" size="55" maxlength="200" value="" class="cmfont1"><br>
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>배송시요구사항</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<textarea name="memo" cols="60" rows="3" class="cmfont1"></textarea>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="960" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			</form>

			<table width="960" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="center">
						<img src="images/b_order4.gif" onclick="Check_Value()" style="cursor:hand">

						<!-- 이 바튼은 단지 다음문서로 가는 테스트용 버튼임. 삭제할 것  -->
						<!--&nbsp;&nbsp <input type="button" value="다음 문서로(테스트용)" onclick="form2.submit();">-->

					</td>
				</tr>
				<tr height="20"><td></td></tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php"
?>