<?
  include "../common.php";

  $query = "delete from jumun where no35='$no';";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $query2 = "delete from jumuns where jumun_no35 = '$no';";
  $result = mysqli_query($db, $query2);
  if(!$result2) exit("$query2");

  $name = $_POST[name];
?>

<script>location.href = "jumun.php"</script>