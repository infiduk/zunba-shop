<?
  include "../common.php";

  $name=addslashes($name);
  $content=addslashes($content);

$fname1=$imagename1;

if(!$image) $fname1 = "noimage.jpg";

  if ($_FILES["image"]["error"]==0) 
  {
    $fname1=$_FILES["image"]["name"];    
    if (!move_uploaded_file($_FILES["image"]["tmp_name"],
          "../album/picture/" . $fname1)) exit("업로드 실패");
  }

  $query = "update album set name35 = '$name', image35 = '$fname1' where no35 = '$no'";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "album.php"</script>