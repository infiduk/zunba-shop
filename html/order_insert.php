<?
  include "common.php";
  
  $jumunday = date("20y-m-d");

  $query_no = "select no35 from jumun order by no35 desc;";
  $result_no=mysqli_query($db,$query_no);
  if(!$result_no) exit("쿼리에러 $query_no"); // 에러 조사
  $row_no=mysqli_fetch_array($result_no);
  $count_no=mysqli_num_rows($result_no); 

  if($count_no > 0) {
	$now_no = $row_no[no35] + 1;
  }
  else {
	  $now_no = date("ymd") . "0001";
  }

$total=0;
$product_nums = 0;
$product_names = "";
for ($i=1;  $i<=$n_cart;  $i++)
{
   if ($cart[$i]) // 제품정보가 있는 경우만
   {
       // • 장바구니 cookie에서 제품번호, 수량, 소옵션번호1,2 알아내기
	   list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
       // • 제품정보(제품번호, 단가, 할인여부, 할인율) 알아내기
	   $query_pr="select * from product where no35=$no;";
	   $result_pr=mysqli_query($db,$query_pr);
	   if(!$result_pr) exit("쿼리에러 $query_pr"); // 에러 조사
	   $row_pr=mysqli_fetch_array($result_pr);
	   $count_pr=mysqli_num_rows($result_pr); 

	   if($row_pr[discount35]) {
		   $price = $row_pr[price35] - ($row_pr[price35]*($row_pr[discount35]/100));
		   $cash = ($price*$num);
	   }
	   else {
		   $price = $row_pr[price35];
		   $cash = $price*$num;
	   }
       // • insert SQL문을 이용하여 jumuns 테이블에 저장.
       // (주문번호, 제품번호, 수량, 단가, 금액, 할인율, 소옵션번호1,2)
	   $query_jms = "insert into jumuns (jumun_no35, product_no35, num35, price35, cash35, discount35, opts_no135, opts_no235) values ('$now_no', '$no', '$num', '$price', '$cash', '$row_pr[discount35]', '$opts1', '$opts2');";
	   $result_jms = mysqli_query($db, $query_jms);
	   if(!$result_jms) exit("$query_jms");

       // • 장바구니 cookie에서 제품 정보 삭제.
	   setcookie("cart[$i]", "");
       // • 총금액 = 총금액 + 금액;
	   $total = $total + $cash;
       $product_nums = $product_nums + 1;
       if ($product_nums == 1) $product_names = $row_pr[name35];
   }
}
if ($product_nums>1)  // 제품수가 2개 이상인 경우만, "외 ?" 추가
{
    $tmp = $product_nums;
    $product_names = $product_names . " 외 " . $tmp;
}

if ($total < 100000) 
{
    // • insert SQL문을 이용하여 jumuns테이블에 배송비 정보 저장.
    //  (주문_번호, 0, 1, 배송비, 배송비, 0, 0, 0,)
	$query_bs = "insert into jumuns (jumun_no35, product_no35, num35, price35, cash35, discount35, opts_no135, opts_no235) values ('$now_no', '0', '1', '2500', '2500', '0', '0', '0');";
	$result_bs = mysqli_query($db, $query_bs);
	if(!$result_bs) exit("$query_bs"); 
    // • 총금액 = 총금액 + 배송비;
	$total = $total + 2500;
}

if ($cookie_no)
   $o_no=$cookie_no;
else
   $o_no=0;

$card_okno = mt_rand(1,1000000);

  $query_jm = "insert into jumun (no35, member_no35, jumunday35, product_names35, product_nums35, o_name35, o_tel35, o_phone35, o_email35, o_zip35, o_juso35, r_name35, r_tel35, r_phone35, r_email35, r_zip35, r_juso35, memo35, pay_method35, card_okno35, card_halbu35, card_kind35, bank_kind35, bank_sender35, total_cash35, state35) values ('$now_no', '$o_no', '$jumunday', '$product_names', '$product_nums', $o_name, '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_juso', '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_juso', '$memo', '$pay_method', '$card_okno', '$card_halbu', '$card_kind', '$bank_kind', '$bank_sender', '$total', '1');";
  $result_jm = mysqli_query($db, $query_jm);
  if(!$result_jm) exit("$query_jm");

  $name = $_POST[name];
?>

<script>location.href = "order_ok.php"</script>