<?php
  if (!isset($_POST['id'])) exit();
  $id=$_POST['id'];
  $title_new=$_POST['title_new'];
  $text_new=$_POST['text_new'];
  require_once "blocks/bd.php";
  
  // Changing image if exist
  if ($_FILES["filename"]["name"]!="")
  {
    if($_FILES["filename"]["size"] > 1024*3*1024)
      {
       echo ("Размер файла превышает три мегабайта");
       exit;
      }
   
   if (($_FILES["filename"]["type"] == "image/gif") 
    || ($_FILES["filename"]["type"] == "image/jpeg") 
    || ($_FILES["filename"]["type"] == "image/png") 
    || ($_FILES["filename"]["type"] == "image/pjpeg"))
   {
    $exp=explode(".",$_FILES['filename']['name']);
    $format=end($exp); // Format of the file
    // Checking if the file is downloaded
    if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
    {
      
      // If it downloaded, we put it into uploads/id<id of the new>.<format>
      $imAdres="uploads/".$id.".".$format;
      if (!move_uploaded_file($_FILES["filename"]["tmp_name"], $imAdres))
	 echo "Вибачте, але ваша картинка не додалась!<a href='index.php'>Повернутися на головну сторінку</a>";
      else move_uploaded_file($_FILES["filename"]["tmp_name"], $imAdres);
      
      // Checking necessary size else delete
      $size = getimagesize("$imAdres");
      if ($size[0]>450 || $size[1]>450) {
	unlink("$imAdres");
	echo "wrong image size <a href='change_one.php?id=".$id."'>Return</a>";
	exit;
      }
      else {
      
      mysql_query("UPDATE news SET user_img='$imAdres' WHERE id='$id'");
      }
    } else {
       echo("Ошибка загрузки файла");
	    }
   }
   else { echo "wrong image format <a href='change_one.php?id=".$id."'>Return</a>"; exit; }
  }
  
  mysql_query("UPDATE news SET title_new='$title_new', text_new='$text_new' WHERE id='$id'",$db);
  header("Location: change_news.php");
?>
