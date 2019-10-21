<?
  include "../common.php";

  $name=addslashes($name);
  $content=addslashes($content);
  $regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);

$fname1=$imagename1;
$fname2=$imagename2;
$fname3=$imagename3;

if($checkno1 == "1") $fname1="";
if($checkno2 == "1") $fname2="";
if($checkno3 == "1") $fname3="";

  if ($_FILES["image1"]["error"]==0) 
  {
    $fname1=$_FILES["image1"]["name"];    
    if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
          "../product/" . $fname1)) exit("업로드 실패");
  }

  if ($_FILES["image2"]["error"]==0) 
  {
    $fname2=$_FILES["image2"]["name"];    
    if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
          "../product/" . $fname2)) exit("업로드 실패");
  }

  if ($_FILES["image3"]["error"]==0) 
  {
    $fname3=$_FILES["image3"]["name"];    
    if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
          "../product/" . $fname3)) exit("업로드 실패");
 }


  $query = "update product set menu35 = '$menu', code35 = '$code', name35 = '$name', coname35 = '$coname', price35 = '$price', opt135 = '$opt1', opt235 = '$opt2', content_html35 = '$content_html', content35 = '$content', status35 = '$status', regday35 = '$regday', icon_new35 = '$icon_new', icon_hit35 = '$icon_hit', icon_sale35 = '$icon_sale', discount35 = '$discount', image135 = '$fname1', image235 = '$fname2', image335 = '$fname3' where no35 = '$no'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "product.php"</script>