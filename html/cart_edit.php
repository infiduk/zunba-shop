<?
	include "common.php";

	$n_cart = $_COOKIE[n_cart];
	$cart = $_COOKIE[cart];
	$kind = $_REQUEST[kind];

	if (!$n_cart) $n_cart = 0;   // 제품개수 0으로 초기화
	switch ($kind) {
		case "insert":      // 장바구니 담기
	    case "order":      // 바로 구매하기
	         $n_cart++;
	         $cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
			 setcookie("cart[$n_cart]", $cart[$n_cart]);
			 setcookie("n_cart", $n_cart);
	         break;
	    case "delete":      // 제품삭제
	         setcookie("cart[$pos]", "");
			 break;
	    case "update":     // 수량 수정
	         list($no, $num1, $opts1, $opts2) = explode("^", $cart[$pos]);
			 $num1 = $num;
		     $cart[$pos] = implode("^", array($no, $num1, $opts1, $opts2));
			 setcookie("cart[$pos]", $cart[$pos]);
			 // setcookie("pos", $pos);
			 break;
		case "deleteall":    // 장바구니 전체 비우기
			 for($i=1;$i<=$n_cart;$i++)
				{ if ($cart[$i]) setcookie("cart[$i]", ""); }
			 $n_cart = 0;   //  초기화
			 break;
	}

	if ($kind=="order")
	    echo("<script>location.href = 'order.php'</script>");
	else
	    echo("<script>location.href = 'cart.php'</script>");
?>