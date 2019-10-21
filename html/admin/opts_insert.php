<?
  include "../common.php";

  $query = "insert into opts (opt_no35, name35) values ('$no1', '$name');";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "opts.php?no1=<?=$no1?>"</script>