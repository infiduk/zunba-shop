<?
  include "../common.php";

  $query = "delete from product where no35 = $no;";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");
?>

<script>location.href = "product.php"</script>