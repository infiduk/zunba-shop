<?
  include "../common.php";

	$n_data = $_COOKIE[n_data];
	$data = $_COOKIE[data];
	$name = $_REQUEST[name];
	$num = $_REQUEST[num];
	
	if (!$n_data) $n_data = 0;   // ��ǰ���� 0���� �ʱ�ȭ
	$n_data++;
	$data[$n_data] = implode("^^", array($n_data, $name, $num));
	setcookie("data[$n_data]", $data[$n_data]);
	setcookie("n_data", $n_data);

?>

<script>location.href = "cookie.php"</script>