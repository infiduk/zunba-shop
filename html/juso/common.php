<?
  error_reporting(E_ALL & ~E_NOTICE); // 에러메시지 On
  ini_set("display_error", 1);
  $db = mysqli_connect("localhost", "shop35", "2010sso0609", "shop35");
  if(!$db) exit("DB연결에러");

  $page_line = 5; // 페이지당 line 수
  $page_block = 5; // 블록당 page 수

  extract($_POST);
  extract($_GET);
  extract($_FILES);
  extract($_COOKIE);
  extract($_SESSION);
  extract($_SERVER);
  extract($_ENV);
?>