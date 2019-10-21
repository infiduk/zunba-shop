<?
  include "common.php";

  $query = "insert into sj35 (name35, kor35, eng35, mat35, hap35, avg35) values ('$name', $kor, $eng, $mat, $hap, $avg);";
  $result = mysqli_query($db, $query);
  if(!$result) exit("쿼리에러");

  $name = $_POST[name];
?>

<script>location.href = "sj_list.php"</script>