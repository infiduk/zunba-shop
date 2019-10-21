<?
  include "../common.php";

	$n_data = $_COOKIE[n_data];
	$data = $_COOKIE[data];
	$name = $_REQUEST[name];
	$num = $_REQUEST[num];
	
	setcookie("data[$no]", "");

?>

<script>location.href = "cookie.php"</script>