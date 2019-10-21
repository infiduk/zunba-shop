<?
  include "common.php";
$cookie_no = $_COOKIE[cookie_no];
  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
  $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query = "select * from member where no35 = $cookie_no;";
  if(!$pwd1) $query = "update member set name35 = '$name', birthday35 = '$birthday', sm35 = '$sm', tel35 = '$tel', phone35 = '$phone', zip35 = '$zip', juso35 = '$juso', email35 = '$email' where no35 = $cookie_no;";
  else $query = "update member set pwd35 = '$pwd1', name35 = '$name', birthday35 = '$birthday', sm35 = $sm, tel35 = '$tel', phone35 = '$phone', zip35 = '$zip', juso35 = '$juso', email35 = '$email' where no35 = $cookie_no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "member_joinend.php"</script>