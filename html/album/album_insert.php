<?
  include "../common.php";

  $name=addslashes($name);
  $content=addslashes($content);

  $fname1="";
  if(!$image) $image = "noimage.jpg";
  if ($_FILES["image"]["error"]==0) 
  {
    $fname1=$_FILES["image"]["name"];    
    if (!move_uploaded_file($_FILES["image"]["tmp_name"],
          "../album/picture/" . $fname1)) exit("업로드 실패");
  }

  $query = "insert into album (name35, image35)  values ('$name', '$fname1');";
  $result = mysqli_query($db, $query);
  if(!$result) exit("$query");

  $name = $_POST[name];
?>

<script>location.href = "album.php"</script>