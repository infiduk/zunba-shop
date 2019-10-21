<?
  include "common.php";

  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query = "insert into juso (name35, tel35, sm35, birthday35, juso35) values ('$name', '$tel', $sm, '$birthday', '$juso');";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "juso_list.php"</script>