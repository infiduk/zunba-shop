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

<script language="JavaScript">
	function imageView(strImage)
	{
		this.document.images["big"].src = strImage;
	}
</script>

</head>

<body style="margin:0">

<?
	$query = "select * from product where no35 = $no;";
	$result = mysqli_query($db, $query);
	if(!$result) exit("쿼리에러 $query");
	$row = mysqli_fetch_array($result); // 1 레코드 읽기
	
	$regday1=substr($row[regday35],0,4);
	$regday2=substr($row[regday35],5,2);
	$regday3=substr($row[regday35],8,2);
?>

<form name="form1" method="post" action="product_update.php" enctype="multipart/form-data">

<input type="hidden" name="sel1" value="<?=$sel1?>">
<input type="hidden" name="sel2" value="<?=$sel2?>">
<input type="hidden" name="sel3" value="<?=$sel3?>">
<input type="hidden" name="sel4" value="<?=$sel4?>">
<input type="hidden" name="text1" value="<?=$text1?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="no" value="<?=$no?>">

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
<? if($row[menu35]==0)
	echo("<option value='0' selected>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2'>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8'>악세사리</option>");
   else if($row[menu35]==1)
	echo("<option value='0'>상품분류를 선택하세요</option>
				<option value='1' selected>아우터</option>
				<option value='2'>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8'>악세사리</option>");
   else if($row[menu35]==2)
	echo("<option value='0'>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2' selected>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8'>악세사리</option>");
   else if($row[menu35]==3)
	echo("<option value='0' selected>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2'>상의</option>
				<option value='3' selected>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8'>악세사리</option>");
   else if($row[menu35]==4)
	echo("<option value='0' selected>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2'>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4' selected>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8'>악세사리</option>");
   else if($row[menu35]==5)
	echo("<option value='0' selected>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2'>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5' selected>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8'>악세사리</option>");
   else if($row[menu35]==6)
	echo("<option value='0' selected>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2'>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6' selected>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8'>악세사리</option>");
   else if($row[menu35]==7)
	echo("<option value='0' selected>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2'>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7' selected>가방/신발</option>
				<option value='8'>악세사리</option>");
   else
	echo("<option value='0' selected>상품분류를 선택하세요</option>
				<option value='1'>아우터</option>
				<option value='2'>상의</option>
				<option value='3'>셔츠/블라우스</option>
				<option value='4'>하의</option>
				<option value='5'>스커트/원피스</option>
				<option value='6'>트레이닝</option>
				<option value='7'>가방/신발</option>
				<option value='8' selected>악세사리</option>");
?>
			</select>
		</td>
	</tr>
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품코드</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="code" value="<?=$row[code35]?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품명</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row[name35]?>" size="60" maxlength="60">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제조사</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="coname" value="<?=$row[coname35]?>" size="30" maxlength="30">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">판매가</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="price" value="<?=$row[price35]?>" size="12" maxlength="12"> 원
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">옵션</td>
		<td width="700"  bgcolor="#F2F2F2">
<?
$query = "select * from opt order by name35;";
$result = mysqli_query($db, $query); // sql문 실행
if(!$result) exit("쿼리에러 $query"); // 에러 조사
$count = mysqli_num_rows($result); // 레코드 개수
?><u></u>
			<select name="opt1">
<?
for($i = 0; $i < $count; $i++)
  {
	  $row1 = mysqli_fetch_array($result);
	  if($row[opt135]==$row1[no35]) echo("<option value='$row1[no35]' selected>$row1[name35]</option>");
	  else echo("<option value='$row1[no35]'>$row1[name35]</option>");
  }
?>
			</select> &nbsp; &nbsp; 

			<select name="opt2">
<?
$query = "select * from opt order by name35;";
$result = mysqli_query($db, $query);
if(!$result) exit("쿼리에러 $query");
$count = mysqli_num_rows($result);
for($i = 0; $i < $count; $i++)
  {
	  $row2 = mysqli_fetch_array($result);
	  if($row[opt235]==$row2[no35]) echo("<option value='row2[no35]' selected>$row2[name35]</option>");
	  else echo("<option value='$row2[no35]'>$row2[name35]</option>");
  }
?>
			</select> &nbsp; &nbsp; 
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제품설명</td>
		<td width="700"  bgcolor="#F2F2F2">
<?
	if ($row[content_html35]==0) 
		echo("<input type='radio' name='content_html' value='0' checked>text <input type='radio' name='content_html' value='1'>html");
	else
		echo("<input type='radio' name='content_html' value='0' >text <input type='radio' name='content_html' value='1' checked>html");
?>
			<br>
<?
	if ($row[content_html35]==0) {
		echo("<textarea name='content' rows='4' cols='70'>$row[content35]</textarea>");
	}
	else {
		echo("<textarea name='content' rows='4' cols='70'>$row[content35]</textarea>");
	}
?>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품상태</td>
    <td width="700"  bgcolor="#F2F2F2">
<?
if($row[status35]==1)
	echo("<input type='radio' name='status' value='1' checked>판매중 <input type='radio' name='status' value='2'>판매중지 <input type='radio' name='status' value='3'>품절");
else if($row[status35]==2)
	echo("<input type='radio' name='status' value='1'>판매중 <input type='radio' name='status' value='2' checked>판매중지 <input type='radio' name='status' value='3'>품절");
else
	echo("<input type='radio' name='status' value='1'>판매중 <input type='radio' name='status' value='2'>판매중지 <input type='radio' name='status' value='3' checked>품절");
?>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">아이콘</td>
		<td width="700"  bgcolor="#F2F2F2">
<?
if($row[icon_new35]==0)
	echo("<input type='checkbox' name='icon_new' value='1'> New &nbsp;&nbsp");
else
	echo("<input type='checkbox' name='icon_new' value='1' checked> New &nbsp;&nbsp");

if($row[icon_hit35]==0)
	echo("<input type='checkbox' name='icon_hit' value='1'> Hit &nbsp;&nbsp");
else
	echo("<input type='checkbox' name='icon_hit' value='1' checked> Hit &nbsp;&nbsp");

if($row[icon_sale35]==0)
	echo("<input type='checkbox' name='icon_sale' value='1'> Sale &nbsp;&nbsp");
else
	echo("<input type='checkbox' name='icon_sale' value='1' checked> Sale &nbsp;&nbsp");
?>
			할인율 : <input type="text" name="discount" value="<?=$row[discount35]?>" size="3" maxlength="3"> %
		</td>

	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">등록일</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="regday1" value="<?=$regday1?>" size="4" maxlength="4"> 년 &nbsp
			<input type="text" name="regday2" value="<?=$regday2?>" size="2" maxlength="2"> 월 &nbsp
			<input type="text" name="regday3" value="<?=$regday3?>" size="2" maxlength="2"> 일 &nbsp
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">이미지</td>
		<td width="700"  bgcolor="#F2F2F2">

			<table border="0" cellspacing="0" cellpadding="0" align="left">
				<tr>
					<td>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<input type='hidden' name='imagename1' value='<?=$row[image135]?>'>
									&nbsp;<input type="checkbox" name="checkno1" value="1"> <b>이미지1</b>: <?=$row[image135]?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image1" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td>
									<input type='hidden' name='imagename2' value='<?=$row[image235]?>'>
									&nbsp;<input type="checkbox" name="checkno2" value="1"> <b>이미지2</b>: <?=$row[image235]?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image2" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td>
									<input type='hidden' name='imagename3' value='<?=$row[image335]?>'>
									&nbsp;<input type="checkbox" name="checkno3" value="1"> <b>이미지3</b>:
									<?=$row[image335]?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image3" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td><br>&nbsp;&nbsp;&nbsp;※ 삭제할 그림은 체크를 하세요.</td>
							</tr> 
				  	</table>

						<br><br><br><br><br>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
<?
$fname1=$imagename1;
$fname2=$imagename2;
$fname3=$imagename3;

if(!$row[image135]) $row[image135] = "nopic.jpg";
if(!$row[image235]) $row[image235] = "nopic.jpg";
if(!$row[image335]) $row[image335] = "nopic.jpg";
?>
								<td  valign="middle">&nbsp;
									<img src="../product/<?=$row[image135]?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$row[image135]?>')">&nbsp;
									<img src="../product/<?=$row[image235]?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$row[image235]?>')">&nbsp;
									<img src="../product/<?=$row[image335]?>"  width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$row[image335]?>')">&nbsp;
								</td>
							</tr>				 
						</table>
					</td>
					<td>
						<td align="right" width="310"><img name="big" src="../product/<?=$row[image135]?>" width="300" height="300" border="1"></td>
					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="5">
	<tr> 
		<td align="center">
			<input type="submit" value="수정하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
