<?
  include "common.php";

  //$zip = sprintf("%-3s%-3s", $zip1, $zip2);
  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
  $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query = "insert into member (uid35, pwd35, name35, birthday35, sm35, tel35, phone35, email35, zip35, juso35, gubun35) values ('$uid', '$pwd', '$name', '$birthday', $sm, '$tel', '$phone', '$email', '$zip', '$juso', 0);";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "member_joinend.php"</script>