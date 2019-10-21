<?
  include "common.php";

  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query = "update juso set name35 = '$name', tel35 = '$tel', sm35 = $sm, birthday35 = '$birthday', juso35 = '$juso' where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "juso_list.php"</script>