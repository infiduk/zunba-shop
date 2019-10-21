<?
  include "common.php";

  $query = "delete from sj35 where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("쿼리에러");
?>

<script>location.href = "sj_list.php"</script>