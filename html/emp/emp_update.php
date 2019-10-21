<?
  include "../common.php";

  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);

  $query = "update emp set name35 = '$name', tel35 = '$tel' where no35 = '$no1'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "emp.php"</script>