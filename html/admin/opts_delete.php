<?
  include "../common.php";

  $query = "delete from opts where no35 = $no2;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");
?>

<script>location.href = "opts.php?no1=<?=$no1?>"</script>