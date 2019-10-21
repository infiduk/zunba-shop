<?
	include "../common.php";
?>
<html>
<head>
	<title>주소록 프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>

<body>

<form name="form1" method="post" action="emp_insert.php">

<table width="500" border="1" cellpadding="2" bgcolor="lightyellow" style="border-collapse:collapse">
  <tr>
    <td width="100" align="center" bgcolor="lightblue">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">전화</td>
    <td width="400" align="left">
      <input type="text" name="tel1" size="3" maxlength="3" value=""> -
      <input type="text" name="tel2" size="4" maxlength="4" value=""> -
      <input type="text" name="tel3" size="4" maxlength="4" value="">
    </td>
  </tr>
</table>
<br>
<table width="500" border="0">
  <tr>
    <td align="center"> 
	  <input type="submit" value="등록"> &nbsp
	  <input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>