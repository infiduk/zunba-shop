<?
  include "../common.php";

  $query = "update opt set name35 = '$name' where no35 = '$no1'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "opt.php"</script>