<?
  include "../common.php";

  $query = "delete from member where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");
?>

<script>location.href = "member.php"</script>