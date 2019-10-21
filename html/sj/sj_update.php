<?
  include "common.php";

  $query = "update sj35 set name35 = '$name', kor35 = $kor, eng35 = $eng, mat35 = $mat, hap35 = $hap, avg35 = $avg where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("쿼리에러");
?>

<script>location.href = "sj_list.php"</script>