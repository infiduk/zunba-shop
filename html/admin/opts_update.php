<?
  include "../common.php";

  $query = "update opts set name35 = '$name' where no35 = '$no2'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "opts.php?no1=<?=$no1?>"</script>