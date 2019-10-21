<?
  include "../common.php";

  $query = "update jumun set state35 = '$state' where no35 = '$no'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "member.php"</script>