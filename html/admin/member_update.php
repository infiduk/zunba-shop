<?
  include "../common.php";

  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
  $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query = "update member set pwd35 = '$pwd', name35 = '$name', birthday35 = '$birthday', sm35 = $sm, tel35 = '$tel', phone35 = '$phone', zip35 = '$zip', juso35 = '$juso', email35 = '$email', gubun35 = '$gubun' where no35 = '$no'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "member.php"</script>