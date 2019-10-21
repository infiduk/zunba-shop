<?
	include "common.php";

     @extract($_POST);
     @extract($_GET);
     @extract($_COOKIE);
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2014.8)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>

<!-- 화면 상단 부분 시작 (main_top) ------------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#3f7153">
	<tr> 
		<!--<td>
			<!--  상단 왼쪽 로고  --------------------------------------------
			<table border="0" cellspacing="0" cellpadding="0" width="182">
				<tr>
					<td><a href="main.php"><img src="images/zunbashop_top_logo.png" width="182" height="40" border="0"></a></td>
				</tr>
			</table>
		</td>-->
		<td align="left" valign="center">
			<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<?
		if (!$cookie_no) echo("<td width='200' align='center'><font color='white'>&nbsp;&nbsp;&nbsp <b>로그인 후 이용 해주세요.</b></font></td>");
		else echo("<td width='200' align='center'><font color='white'>&nbsp; <b>Welcome ! &nbsp;&nbsp $cookie_name 님.</b></font></td>");

		// <td width="181" align="center"><font color="#666666">&nbsp <b>Welcome ! &nbsp;&nbsp 고객님.</b></font></td>
				?>
			</tr>
			</table>
		</td>
		<td align="right" valign="bottom">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
				<?
				if(!$cookie_no) { echo("
					<td><a href='member_login.php'><img src='images/zunbashop_top_menu02.png' border='0'></a></td>");
					// <td><img src='images/top_menu_line.gif' width='11'></td>
					echo("<td><a href='member_agree.php'><img src='images/zunbashop_top_menu03.png' border='0'></a></td>");
					// <td><img src='images/top_menu_line.gif' width='11'></td>");
				}
				else { echo("
					<td><a href='member_logout.php'><img src='images/zunbashop_top_menu02_1.png' border='0'></a></td>");
					// <td><img src='images/top_menu_line.gif' width='11'></td>
					echo("<td><a href='member_edit.php'><img src='images/zunbashop_top_menu03_1.png' border='0'></a></td>");
					// <td><img src='images/top_menu_line.gif' width='11'></td>");
				}
					?>
					<td><a href="main.php"><img src="images/zunbashop_top_menu01.png" border="0"></a></td>
					<!--<td><img src="images/top_menu_line.gif" width="11"></td> -->
					
					<td><a href="cart.php"><img src="images/zunbashop_top_menu05.png" border="0"></a></td>
					<!-- <td><img src="images/top_menu_line.gif" width="11"></td> -->
					<td><a href="jumun_login.php"><img src="images/zunbashop_top_menu06.png" border="0"></a></td>
					<!-- <td><img src="images/top_menu_line.gif"width="11"></td> -->
					<td><img src="images/zunbashop_top_menu08.png" onclick="javascript:Add_Site();" style="cursor:hand"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table width="959" height="100" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr align="center"> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->
			<table border="0" cellspacing="0" cellpadding="0" width="182">
				<tr>
					<td align="center"><a href="main.php"><img src="images/zunbashop_top_logo.png" width="182" height="40" border="0"></a></td>
				</tr>
			</table>
		</td>
	</tr>



<!--  Category 메뉴 : 가로형인 경우  -------------------------------------->
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" bgcolor="#F7F7F7">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="product.php?menu=1"><img src="images/zunbashop_main_menu01_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=2"><img src="images/zunbashop_main_menu02_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=3"><img src="images/zunbashop_main_menu03_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=4"><img src="images/zunbashop_main_menu04_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=5"><img src="images/zunbashop_main_menu05_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=6"><img src="images/zunbashop_main_menu06_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=7"><img src="images/zunbashop_main_menu07_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=8"><img src="images/zunbashop_main_menu08_off.png" width="120" height="40" border="0"  onmouseover="img_change('off')" onmouseout="img_change('off')"></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!------------------------------------------------------------------------>

<!-- 상품 검색 ------------------------------------->
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="1" colspan="5" bgcolor="white"></td></tr>
	<tr bgcolor="white">
	<? /*
		if (!$cookie_no) echo("<td width='181' align='center'><font color='#666666'>&nbsp <b>Welcome ! 로그인을 해주세요.</b></font></td>");
		else echo("<td width='181' align='center'><font color='#666666'>&nbsp <b>Welcome ! &nbsp;&nbsp $cookie_name 님.</b></font></td>");
	   */
		// <td width="181" align="center"><font color="#666666">&nbsp <b>Welcome ! &nbsp;&nbsp 고객님.</b></font></td>
	?>
		<td style="font-size:9pt;color:#666666;padding-left:5px;"></td>
		<td align="right" style="font-size:9pt;color:#666666;"><b>Search : &nbsp</b></td>
		<!-- form1 시작 -->
		<form name="form1" method="post" action="main.php">
		<td width="135">
			<input type="text" name="findtext" maxlength="40" size="18" class="cmfont1">&nbsp;
		</td>
		</form>
		<!-- form1 끝 -->
		<td width="35" align="center"><a href="javascript:Search()"><img src="images/zunbashop_i_search1.png" border="0"></a></td>
	</tr>
	<tr><td height="1" colspan="5" bgcolor="#E5E5E5"></td></tr>
</table>
<!-- 화면 상단 부분 끝 (main_top) ------------------------------------->

<!--  메인 이미지 --------------------------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<!--<td><img src="images/zunbashop_main_image0.png" width="182" height="500"></td>-->
		<td><img src="images/zunbashop_main_image1.gif" width="960" height="500"></td>
	</tr>
</table>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="5" bgcolor="white"></td></tr>
</table>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="1" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
			<table width="181" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
						<!--  Category 메뉴 : 세로인 경우 -------------------------------->
						<table width="177">
							<!--<tr><td height="3"  bgcolor="#bfbfbf"></td></tr>
							<tr><td height="30" bgcolor="#f0f0f0" align="center" style="font-size:12pt;color:#333333"><b>Category</b></td></tr>-->
							<tr>
								<!--<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=1"><img src="images/main_menu01_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=2"><img src="images/main_menu02_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=3"><img src="images/main_menu03_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=4"><img src="images/main_menu04_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=5"><img src="images/main_menu05_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=6"><img src="images/main_menu06_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=7"><img src="images/main_menu07_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=8"><img src="images/main_menu08_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<!--<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=9"><img src="images/main_menu09_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=10"><img src="images/main_menu10_off.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>-->
						</table>
					</td>
				</tr>
				<tr><td height="10"></td></tr>
				<tr> 
					<td> 
						<!--  Custom Service 메뉴(QA, FAQ...) 
						<table width="177"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							<tr><td height="3"  bgcolor="#a0a0a0"></td></tr>
							<tr><td height="25" bgcolor="#f0f0f0" align="center" style="font-size:11pt;color:#333333"><b>Customer Service</b></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="qa.html"><img src="images/main_left_qa.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="faq.html"><img src="images/main_left_faq.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="176"></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
		</td>
		<!-- <td width="10"></td>
		<td valign="top"> -->
