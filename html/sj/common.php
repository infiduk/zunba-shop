<?
  error_reporting(E_ALL & ~E_NOTICE); // �����޽��� On
  ini_set("display_error", 1);
  $db = mysqli_connect("localhost", "shop35", "2010sso0609", "shop35");
  if(!$db) exit("DB���ῡ��");

  $page_line = 5; // �������� line ��
  $page_block = 5; // ��ϴ� page ��

  extract($_POST);
  extract($_GET);
  extract($_FILES);
  extract($_COOKIE);
  extract($_SESSION);
  extract($_SERVER);
  extract($_ENV);
?>