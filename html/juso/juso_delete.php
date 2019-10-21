<?
  include "common.php";

  $query = "delete from juso where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");
?>

<script>location.href = "juso_list.php"</script>