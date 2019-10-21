<?
  include "../common.php";

  $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);

  $query = "insert into emp (name35, tel35) values ('$name', '$tel');";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "emp.php"</script>