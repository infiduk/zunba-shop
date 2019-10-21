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
</head>

<body style="margin:0">

<form name="form1" method="post" action="product_insert.php" enctype="multipart/form-data">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품분류</td>
		<td width="700" bgcolor="#F2F2F2">
			<select name="menu">
				<option value="0" selected>상품분류를 선택하세요</option>
				<option value="1">아우터</option>
				<option value="2">상의</option>
				<option value="3">셔츠/블라우스</option>
				<option value="4">하의</option>
				<option value="5">스커트/원피스</option>
				<option value="6">트레이닝</option>
				<option value="7">가방/신발</option>
				<option value="8">악세사리</option>
			</select>
		</td>
	</tr>
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품코드</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="code" value="" size="20" maxlength="20">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품명</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="name" value="" size="60" maxlength="60">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제조사</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="coname" value="" size="30" maxlength="30">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">판매가</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="price" value="" size="12" maxlength="12"> 원
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">옵션</td>
    <td width="700" bgcolor="#F2F2F2">
<?
// $query = "select * from opts where opt_no35 = 1 order by name35;";
$query = "select * from opt order by name35;";
$result = mysqli_query($db, $query); // sql문 실행
if(!$result) exit("쿼리에러 $query"); // 에러 조사
$count = mysqli_num_rows($result); // 레코드 개수
?>
			<select name='opt1'>
				<option value='0' selected>옵션선택</option>
				<!-- <option value='0'>사이즈</option> -->
<?
for($i = 0; $i < $count; $i++)
  {
	  $row = mysqli_fetch_array($result);
	  echo("<option value='$row[no35]'>$row[name35]</option>");
  }
?>
			</select> &nbsp
			<select name="opt2">
				<option value="0" selected>옵션선택</option>
				<!-- <option value='0'>색상</option> -->
<?
$opt = $row[no35];
// $query = "select * from opts where opt_no35 = 3 order by name35;";
$query = "select * from opt order by name35;";
$result = mysqli_query($db, $query);
if(!$result) exit("쿼리에러 $query");
$count = mysqli_num_rows($result);

for($i = 0; $i < $count; $i++)
  {
	  $row = mysqli_fetch_array($result);
	  echo("<option value='$row[opt_no35]'>$row[name35]</option>");
  }
?>
			</select> &nbsp; &nbsp; 
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제품설명</td>
		<td width="700" bgcolor="#F2F2F2">
			<textarea name="content" rows="10" cols="80"></textarea>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품상태</td>
    <td width="700" bgcolor="#F2F2F2">
			<input type="radio" name="status" value="1" checked> 판매중
			<input type="radio" name="status" value="2"> 판매중지
			<input type="radio" name="status" value="3"> 품절
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">아이콘</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="checkbox" name="icon_new" value="1"> New &nbsp;&nbsp	
			<input type="checkbox" name="icon_hit" value="1"> Hit &nbsp;&nbsp	
			<input type="checkbox" name="icon_sale" value="1"> Sale &nbsp;&nbsp
<?
if ($icon_new == 0) $icon_new=0; else $icon_new=1;
if ($icon_hit == 0) $icon_hit=0; else $icon_hit=1;
if ($icon_sale == 0) $icon_sale=0; else $icon_sale=1;
?>
			할인율 : <input type="text" name="discount" value="" size="3" maxlength="3"> %
		</td>
	</tr>
	<tr> 
<?
$today_y=date("Y");
$today_m=date("m");
$today_d=date("d");
?>
		<td width="100" bgcolor="#CCCCCC" align="center">등록일</td>
		<td width="700" bgcolor="#F2F2F2">
			<input type="text" name="regday1" value="<?=$today_y?>" size="4" maxlength="4"> 년 &nbsp
			<input type="text" name="regday2" value="<?=$today_m?>" size="2" maxlength="2"> 월 &nbsp
			<input type="text" name="regday3" value="<?=$today_d?>" size="2" maxlength="2"> 일
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">이미지</td>
		<td width="700" bgcolor="#F2F2F2">
			<b>이미지1</b>: <input type="file" name="image1" size="30" value="찾아보기"><br>
			<b>이미지2</b>: <input type="file" name="image2" size="30" value="찾아보기"><br>
			<b>이미지3</b>: <input type="file" name="image3" size="30" value="찾아보기"><br>
		</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="submit" value="등록하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
