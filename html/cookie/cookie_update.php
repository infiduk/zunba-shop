<?
	include "../common.php";

	$n_data = $_COOKIE[n_data];
	$data = $_COOKIE[data];
	$name = $_REQUEST[name];
	$num = $_REQUEST[num];

	list($n_data, $name1, $num1) = explode("^^", $data[$no]);
	$name1 = $name;
	$num1 = $num;
	$data[$no] = implode("^^", array($n_data, $name, $num));
	setcookie("data[$no]", $data[$no]);

?>

<script>location.href = "cookie.php"</script>