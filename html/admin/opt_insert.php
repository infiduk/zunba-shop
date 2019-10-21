<?
  include "../common.php";

  $query = "insert into opt (name35) values ('$name');";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "opt.php"</script>