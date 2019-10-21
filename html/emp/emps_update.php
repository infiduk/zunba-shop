<?
  include "../common.php";

  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query = "update emps set name35 = '$name', birthday35 = '$birthday' where no35 = '$no2'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "emps.php?no1=<?=$no1?>"</script>