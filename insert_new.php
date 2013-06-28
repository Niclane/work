<?php 
if (isset($_POST['title_new'])) {
  $title_new=$_POST['title_new'];
  if ($title_new=="") {
  		if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели назву новини, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";  
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered a title of new, please return to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели имя новости, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
	exit();
  }
  $title_new=htmlspecialchars($title_new);
}

if (isset($_POST['text_new'])) {
  $text_new=$_POST['text_new'];
  if ($text_new=="") {
  		if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели текст новини, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered a text of new, please return to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели текст новости, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
	exit();
  }
  $text_new=htmlspecialchars($text_new);
}

if (!isset($_POST['title_new']) or !isset($_POST['text_new'])) {
		if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, сталася помилка, поверніться на попередню сторінку і спробуйте ще раз!</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, an error occurred, please return to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, возникла ошибка, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
exit();
}


require_once "blocks/bd.php";
$login=$_COOKIE['login'];
$get_names=mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$other_names=mysql_fetch_array($get_names);
$logId=$other_names['id'];
$add_date=date("Y-m-d");
$result=mysql_query("INSERT INTO news (title_new,text_new,date,author) VALUES ('$title_new','$text_new','$add_date','$logId')");

// Adding image
if ($_FILES["filename"]["name"]!="") {
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
      $idIm=mysql_query("SELECT id FROM news ORDER BY id DESC",$db);
      $arrIdIm=mysql_fetch_array($idIm);
      $iD=$arrIdIm['id'];
      $imAdres="uploads/".$iD.".".$format;
      if (!move_uploaded_file($_FILES["filename"]["tmp_name"], $imAdres))
	 echo "Вибачте, але ваша картинка не додалась!<a href='index.php'>Повернутися на головну сторінку</a>";
      else move_uploaded_file($_FILES["filename"]["tmp_name"], $imAdres);
      
      // Checking necessary size else delete
      $size = getimagesize("$imAdres");
      if ($size[0]>450 || $size[1]>450) {
	unlink("$imAdres");
	echo "wrong image size <a href='create_new.php'>Return</a>";
	//deleting from bd
	mysql_query("DELETE FROM news WHERE id='$iD'",$db);
	exit;
      }
      else {
      
      mysql_query("UPDATE news SET user_img='$imAdres' WHERE id='$iD'");
      }
    } else {
       echo("Ошибка загрузки файла");
	    }
   }
   else { echo "wrong format"; exit; }
}


header("Location: index.php");
?>