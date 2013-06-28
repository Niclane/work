<?php
  if (!isset($_COOKIE['login']) || $_COOKIE['login']=="") {
    header("Location: index.php");
  }
  if (!isset($_POST['id'])) {
    echo "Sorry, you wrong entered on this page <a href='index.php'>Back to main page</a>";
    exit();
  }
  require_once "blocks/bd.php";
  $id=$_POST['id'];
  
  // See if empty image
  if ($_FILES["filename"]["name"]!="") {
    
    // See if size is normal
    if($_FILES["filename"]["size"] > 1024*3*1024) {
     echo ("Sorry, but it's too big image");
     exit;
    }
    
    // See if type is normal
    if (($_FILES["filename"]["type"] == "image/gif") 
    || ($_FILES["filename"]["type"] == "image/jpeg") 
    || ($_FILES["filename"]["type"] == "image/png")) {
      $exp=explode(".",$_FILES['filename']['name']);
      $format=end($exp); // We got a format of the file in $format
      
      // Checking if the file is downloaded
      if(is_uploaded_file($_FILES["filename"]["tmp_name"])) {
	
	// If it downloaded, we put original avatar into original_avatars/id<id of the ava>.<format>
	$imAdres="original_avatars/".$id.".".$format;
	if (!move_uploaded_file($_FILES["filename"]["tmp_name"], $imAdres)) {
	 echo "Вибачте, але ваша картинка не додалась!<a href='index.php'>Повернутися на головну сторінку</a>";
	 exit();
	}
	else {
	  move_uploaded_file($_FILES["filename"]["tmp_name"], $imAdres);
	}
	$size = getimagesize($imAdres);
	if ($_FILES["filename"]["type"] == "image/gif") {
	  $resource=imagecreatefromgif ($imAdres);
	} elseif ($_FILES["filename"]["type"] == "image/jpeg") {
	  $resource=imagecreatefromjpeg ($imAdres);
	} elseif ($_FILES["filename"]["type"] == "image/png") {
	  $resource=imagecreatefromjpeg ($imAdres);
	} else {
	  echo "Wrong format";
	  exit();
	}
	$destination=imagecreatetruecolor(150,150);
	$imDest="avatars/".$id.".".$format;
	if (imagecopyresampled($destination,$resource,0,0,0,0,150,150,$size[0],$size[1])) {
	  if ($_FILES["filename"]["type"] == "image/gif") {
	    imagegif($destination,$imDest);
	  } elseif ($_FILES["filename"]["type"] == "image/jpeg") {
	    imagejpeg($destination,$imDest);
	  } elseif ($_FILES["filename"]["type"] == "image/png") {
	    imagepng($destination,$imDest);
	  } else {
	    echo "Wrong format";
	    exit();
	  }
	  imagedestroy($resource);
	  imagedestroy($destination);
	  mysql_query("UPDATE users SET user_img='$imDest' WHERE id='$id'");
	}
	
      } else {
	  echo("Ошибка загрузки файла");
	}
       
        
      
      
      
    } else {
      echo "wrong format";
      exit;
    }
    
    
    
  }
  
  
  
  
  
  if (isset($_POST['surname'])) {
    $surname=$_POST['surname'];
    $surname=trim($surname);
    if ($surname=="") {
      echo "<p>Sorry, but you have not entered your surname, go back to the previous page and fill in all fields <a href='change_profile.php?id=".$id."'>Back</a></p>";
      exit();
    }
    $surname=htmlspecialchars($surname);
  }
  if (isset($_POST['name'])) {
    $name=$_POST['name'];
    $name=trim($name);
    if ($name=="") {
      echo "<p>Sorry, but you have not entered your name, go back to the previous page and fill in all fields <a href='change_profile.php?id=".$id."'>Back</a></p>";
      exit();
    }
    $name=htmlspecialchars($name);
  }
  if (isset($_POST['lastname'])) {
    $lastname=$_POST['lastname'];
    $lastname=trim($lastname);
    if ($lastname=="") {
      echo "<p>Sorry, but you have not entered your surname, go back to the previous page and fill in all fields <a href='change_profile.php?id=".$id."'>Back</a></p>";
      exit();
    }
    $lastname=htmlspecialchars($lastname);
  }
  if (isset($_POST['mob'])) {
    $mob=$_POST['mob'];
    $mob=trim($mob);
    if ($mob=="") {
      echo "<p>Sorry, but you have not entered your surname, go back to the previous page and fill in all fields <a href='change_profile.php?id=".$id."'>Back</a></p>";
      exit();
    }
    $mob=htmlspecialchars($mob);
  }
  if (isset($_POST['mail'])) {
    $mail=$_POST['mail'];
    $mail=trim($mail);
    if ($mail=="") {
      echo "<p>Sorry, but you have not entered your surname, go back to the previous page and fill in all fields <a href='change_profile.php?id=".$id."'>Back</a></p>";
      exit();
    }
    $mail=htmlspecialchars($mail);
  }
  if (isset($_POST['login'])) {
    $login=$_POST['login'];
    $login=trim($login);
    if ($login=="") {
      echo "<p>Sorry, but you have not entered your surname, go back to the previous page and fill in all fields <a href='change_profile.php?id=".$id."'>Back</a></p>";
      exit();
    }
    $login=htmlspecialchars($login);
  }
  
  if (mysql_query("UPDATE users SET surname='$surname', name='$name', lastname='$lastname', mob='$mob', mail='$mail', login='$login' WHERE id='$id'",$db)) {
    header("Location: see_profile.php?id=".$id);
  } else {
    echo "Sorry, something wrong!";
  }
?>