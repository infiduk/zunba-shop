<?
  include "../common.php";

  $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

  $query = "insert into emps (emp_no35, name35, birthday35) values ('$no1', '$name', '$birthday');";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "emps.php?no1=<?=$no1?>"</script>