<?
  include "../common.php";

  $query = "delete from emp where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");
?>

<script>location.href = "emp.php"</script>