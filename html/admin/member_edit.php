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
<script>
	function OpenWinZip(zip_kind)
	{
		window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=500,height=250");
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<?
	$query = "select * from member where no35 = $no;";
	$result = mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	$row = mysqli_fetch_array($result); // 1 레코드 읽기

	$tel1=trim(substr($row[tel35],0,3));        // 0번 위치에서 3자리 문자열 추출
	$tel2=trim(substr($row[tel35],3,4));        // 3번 위치에서 4자리
	$tel3=trim(substr($row[tel35],7,4));        // 7번 위치에서 4자리

	$phone1=trim(substr($row[phone35],0,3));        // 0번 위치에서 3자리 문자열 추출
	$phone2=trim(substr($row[phone35],3,4));        // 3번 위치에서 4자리
	$phone3=trim(substr($row[phone35],7,4));        // 7번 위치에서 4자리

	$birthday1=substr($row[birthday35],0,4);
	$birthday2=substr($row[birthday35],5,2);
	$birthday3=substr($row[birthday35],8,2);
?>

<form name="form2" method="post" action="member_update.php">

<input type="hidden" name="no" value="<?=$no?>">

<table width="600" border="1" cellpadding="2"  style="border-collapse:collapse">
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">ID</td>
		<td width="500" bgcolor="#F2F2F2"><?=$row[uid35]?></td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">암호</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="pwd" value="<?=$row[pwd35]?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">이름</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row[name35]?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">생일</td>
		<td width="500" bgcolor="#F2F2F2">
      <input type="text" name='birthday1' size="4" maxlength="4" value="<?=$birthday1?>" class="cmfont1"><font color="898989">년</font> 
	  <input type="text" name='birthday2' size="2" maxlength="2" value="<?=$birthday2?>" class="cmfont1"><font color="898989">월</font> 
	  <input type="text" name='birthday3' size="2" maxlength="2" value="<?=$birthday3?>" class="cmfont1"><font color="898989">일</font> 
			&nbsp;&nbsp 
<?
if ($row[sm35]==0) echo("<input type='radio' name='sm' value='0' checked>양력 <input type='radio' name='sm' value='1'>음력");
       else echo("<input type='radio' name='sm' value='0' >양력 <input type='radio' name='sm' value='1' checked>음력");
?>
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">전화번호</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1?>"> -
			<input type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2?>"> -
			<input type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3?>">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">핸드폰</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="phone1" size="3" maxlength="3" value="<?=$phone1?>"> -
			<input type="text" name="phone2" size="4" maxlength="4" value="<?=$phone2?>"> -
			<input type="text" name="phone3" size="4" maxlength="4" value="<?=$phone3?>">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">E-Mail</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="email" value="<?=$row[email35]?>" size="40" maxlength="40">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">주소</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="zip" value="<?=$row[zip35]?>" size="5" maxlength="5"> &nbsp 
			<input type="button" value="우편번호 찾기" onClick="javascript:OpenWinZip(0);"> <br>
			<input type="text" name="juso" value="<?=$row[juso35]?>" size="60" maxlength="100">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">회원구분</td>
		<td width="500" bgcolor="#F2F2F2">
<?
if ($row[gubun35]==0) echo("<input type='radio' name='gubun' value='0' checked>회원 <input type='radio' name='gubun' value='1'>탈퇴");
       else echo("<input type='radio' name='gubun' value='0' >회원 <input type='radio' name='gubun' value='1' checked>탈퇴");
?>
		</td>
	</tr>
</table>

<br>
<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="submit" value="수정하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

<br>
</body>
</html>