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
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<?
$query="select * from jumun where no35=$no;";
$result = mysqli_query($db, $query); // sql문 실행
if(!$result) exit("쿼리에러 $query"); // 에러 조사
$count = mysqli_num_rows($result); // 레코드 개수
$row = mysqli_fetch_array($result);

$tel1=trim(substr($row[o_tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
$tel2=trim(substr($row[o_tel35],3,4));        // 3번 위치에서 4자리
$tel3=trim(substr($row[o_tel35],7,4));        // 7번 위치에서 4자리

$o_tel = $tel1. "-". $tel2. "-". $tel3;

$phone1=trim(substr($row[o_phone35],0,3));        // 0번 위치에서 3자리 문자열 추출
$phone2=trim(substr($row[o_phone35],3,4));        // 3번 위치에서 4자리
$phone3=trim(substr($row[o_phone35],7,4));        // 7번 위치에서 4자리

$o_phone = $phone1. "-". $phone2. "-". $phone3;

$tel4=trim(substr($row[r_tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
$tel5=trim(substr($row[r_tel35],3,4));        // 3번 위치에서 4자리
$tel6=trim(substr($row[r_tel35],7,4));        // 7번 위치에서 4자리

$r_tel = $tel4. "-". $tel5. "-". $tel6;

$phone4=trim(substr($row[r_phone35],0,3));        // 0번 위치에서 3자리 문자열 추출
$phone5=trim(substr($row[r_phone35],3,4));        // 3번 위치에서 4자리
$phone6=trim(substr($row[r_phone35],7,4));        // 7번 위치에서 4자리

$r_phone = $phone4. "-". $phone5. "-". $phone6;
?>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$row[no35]?> (<font color="$color"><?=$row[state35]?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[jumunday35]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
<?
if($row[member_no35] == 0)
	echo("<td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name35] (비회원)</td>");
else
	echo("<td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name35] (회원)</td>");
?>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_email35]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[o_zip35]?>) <?=$row[o_juso35]?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_name35]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_email35]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[r_zip35]?>) <?=$row[r_juso35]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row[memo35]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">지불종류</font></td>
<?
	if($row[pay_method] == 1) {
		echo("<td width='300'height='20' bgcolor='#EEEEEE'>카드</td>
		<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드승인번호 </font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[card_okno35]&nbsp</td>
			</tr>
			<tr> 
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드 할부</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[card_halbu35]</td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드종류</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[card_kind35]</td>
	</tr>");
}
	else echo("<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>무통장</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>국민은행:000-00-000000</td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>입금자이름</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[bank_sender35]</td>");
       
?>
</table>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>
	<tr bgcolor="#EEEEEE" height="20">	
		<td width="340" height="20" align="left">파란 브라우스</td>	
		<td width="50"  height="20" align="center">1</td>	
		<td width="70"  height="20" align="right">20,000</td>	
		<td width="70"  height="20" align="right">20,000</td>	
		<td width="50"  height="20" align="center">10 %</td>	
		<td width="60"  height="20" align="center">파랑</td>	
		<td width="60"  height="20" align="center">L</td>	
	</tr>
	<tr bgcolor="#EEEEEE" height="20">	
		<td width="340" height="20" align="left">파란 티셔츠</td>	
		<td width="50"  height="20" align="center">1</td>	
		<td width="70"  height="20" align="right">10,000</td>	
		<td width="70"  height="20" align="right">10,000</td>	
		<td width="50"  height="20" align="center">&nbsp</td>	
		<td width="60"  height="20" align="center">파랑</td>	
		<td width="60"  height="20" align="center">S</td>	
	</tr>
	<tr bgcolor="#EEEEEE" height="20">	
		<td width="340" height="20" align="left">택배비</td>	
		<td width="50"  height="20" align="center">1</td>	
		<td width="70"  height="20" align="right">5,000</td>	
		<td width="70"  height="20" align="right">5,000</td>	
		<td width="50"  height="20" align="center">&nbsp</td>	
		<td width="60"  height="20" align="center">&nbsp</td>	
		<td width="60"  height="20" align="center">&nbsp</td>	
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$row[total_cash35]?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
