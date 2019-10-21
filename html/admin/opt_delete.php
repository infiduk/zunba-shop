<?
  include "../common.php";

  $query = "delete from opt where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");
?>

<script>location.href = "opt.php"</script>