<?
  error_reporting(E_ALL & ~E_NOTICE); // 에러메시지 On
  ini_set("display_error", 1);
  $db = mysqli_connect("localhost", "shop35", "2010sso0609", "shop35");
  if(!$db) exit("DB연결에러");

  $page_line = 5; // 페이지당 line 수
  $page_block = 5; // 블록당 page 수

  $admin_id  = "admin";
  $admin_pw = "1234";

  $baesongbi = 2500;
  $max_baesongbi = 100000;

  $a_menu=array("NEW", "BEST", "블링제작", "아우터", "상의", "셔츠/블라우스", "하의", "스커트/원피스", "트레이닝", "가방/신발", "악세사리");
  $n_menu=count($a_menu);

  $a_idname=array("이름", "ID");

  $a_state=array("전체","주문신청","주문확인","입금확인","배송중","주문완료","주문취소");
  $n_state=count($a_state);

  extract($_POST);
  extract($_GET);
  extract($_FILES);
  extract($_COOKIE);
  extract($_SESSION);
  extract($_SERVER);
  extract($_ENV);
?>