<?
  include "../common.php";

  $name=addslashes($name);
  $content=addslashes($content);
  $regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);

  $fname1="";
  if ($_FILES["image1"]["error"]==0) 
  {
    $fname1=$_FILES["image1"]["name"];    
    if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
          "../product/" . $fname1)) exit("업로드 실패");
  }

  $fname2="";
  if ($_FILES["image2"]["error"]==0) 
  {
    $fname2=$_FILES["image2"]["name"];    
    if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
          "../product/" . $fname2)) exit("업로드 실패");
  }

  $fname3="";
  if ($_FILES["image3"]["error"]==0) 
  {
    $fname3=$_FILES["image3"]["name"];    
    if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
          "../product/" . $fname3)) exit("업로드 실패");
 }

  $query = "insert into product (menu35, code35, name35, coname35, price35, opt135, opt235, content_html35, content35, status35, regday35, icon_new35, icon_hit35, icon_sale35, discount35, image135, image235, image335)  values ('$menu', '$code', '$name', '$coname', '$price', '$opt1', '$opt2', '$content_html', '$content', '$status', '$regday', '$icon_new', '$icon_hit', '$icon_sale', '$discount', '$fname1', '$fname2', '$fname3');";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "product.php"</script>