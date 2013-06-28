<?php 
require_once "blocks/bd.php";
if (!isset($_COOKIE['login']) || $_COOKIE['login']=="") {
  header("Location: index.php");
}
if (!isset($_GET['id'])) {
  echo "Вибачте, але ви неправильно зайшли на цю сторінку <a href='index.php'>Повернутись на головну сторінку</a>";
  exit();
}
$id=$_GET['id'];
$user_inf=mysql_query("SELECT surname,name,lastname,mob,mail,login FROM users WHERE id='$id'",$db);
$inf_arr=mysql_fetch_array($user_inf);


//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title,text_main FROM ua WHERE page='registration'",$db);
  $myrow=mysql_fetch_array($result);
  
  // Selecting header for ua
  $head=mysql_query("SELECT ua FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['ua'];
  
  // Selecting footer for ua
  $foot=mysql_query("SELECT ua FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['ua'];
  
  // Making form of a user in $text_main
  $text_main='<h2 align="center">Редагування свого профілю</h2>
              <form action="script_change_profile.php" method="post" enctype="multipart/form-data">
            	<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
                  <tr>
		    <td>
		      <p>Аватарка: </p>
                    </td>
		    <td>
                      <input type="file" name="filename" />
                    </td>
                  </tr>
		  <tr>
		    <td>
		      <p>Прізвище: </p>
                    </td>
		    <td>
                      <input type="text" name="surname" size="30" maxlength="30" value="'.$inf_arr['surname'].'" />
		      <input type="hidden" name="id" value="'.$id.'">
                    </td>
                  </tr>
                  <tr>
                    <td>
		      <p>Ім&apos;я: </p>
                    </td>
                    <td>
                      <input type="text" name="name" size="30" maxlength="30" value="'.$inf_arr['name'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>По-батькові: </p>
                    </td>
                    <td>
                      <input type="text" name="lastname" size="30" maxlength="30" value="'.$inf_arr['lastname'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Ваш телефон: </p>
                    </td>
                    <td>
                      <input type="text" name="mob" size="20" maxlength="25" value="'.$inf_arr['mob'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Ваш E-mail: </p>
                    </td>
                    <td>
                      <input type="text" name="mail" size="30" maxlength="30" value="'.$inf_arr['mail'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Логін: </p>
                    </td>
                    <td>
                      <input type="text" name="login" size="20" maxlength="20" value="'.$inf_arr['login'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
		      <p><input type="submit" value="Внести зміни" /></p>
		    </td>
                  </tr>         
                </table>
	      </form>';
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT title,text_main FROM en WHERE page='registration'",$db);
  $myrow=mysql_fetch_array($result);
  
  // Selecting header for en
  $head=mysql_query("SELECT en FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['en'];

  // Selecting footer for en
  $foot=mysql_query("SELECT en FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['en'];
  
  // Making form of a user in $text_main
  $text_main='<h2 align="center">Changing your profile</h2>
              <form action="script_change_profile.php" method="post" enctype="multipart/form-data">
            	<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
                  <tr>
		    <td>
		      <p>Avatar: </p>
                    </td>
		    <td>
                      <input type="file" name="filename" />
                    </td>
                  </tr>
		  <tr>
		    <td>
		      <p>Surname: </p>
                    </td>
		    <td>
                      <input type="text" name="surname" size="30" maxlength="30" value="'.$inf_arr['surname'].'" />
		      <input type="hidden" name="id" value="'.$id.'">
                    </td>
                  </tr>
                  <tr>
                    <td>
		      <p>Name: </p>
                    </td>
                    <td>
                      <input type="text" name="name" size="30" maxlength="30" value="'.$inf_arr['name'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Middle name: </p>
                    </td>
                    <td>
                      <input type="text" name="lastname" size="30" maxlength="30" value="'.$inf_arr['lastname'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Your mobile number: </p>
                    </td>
                    <td>
                      <input type="text" name="mob" size="20" maxlength="25" value="'.$inf_arr['mob'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Your E-mail: </p>
                    </td>
                    <td>
                      <input type="text" name="mail" size="30" maxlength="30" value="'.$inf_arr['mail'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Login: </p>
                    </td>
                    <td>
                      <input type="text" name="login" size="20" maxlength="20" value="'.$inf_arr['login'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
		      <p><input type="submit" value="Make changes" /></p>
		    </td>
                  </tr>         
                </table>
	      </form>';
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT title,text_main FROM ru WHERE page='registration'",$db);
  $myrow=mysql_fetch_array($result);
  
  // Selecting header for ru
  $head=mysql_query("SELECT ru FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['ru'];
  
  // Selecting footer for ru
  $foot=mysql_query("SELECT ru FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['ru'];
  
  // Making form of a user in $text_main
  $text_main='<h2 align="center">Редактирование своего профиля</h2>
              <form action="script_change_profile.php" method="post" enctype="multipart/form-data">
            	<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
                  <tr>
		    <td>
		      <p>Аватарка: </p>
                    </td>
		    <td>
                      <input type="file" name="filename" />
                    </td>
                  </tr>
		  <tr>
		    <td>
		      <p>Фамилия: </p>
                    </td>
		    <td>
                      <input type="text" name="surname" size="30" maxlength="30" value="'.$inf_arr['surname'].'" />
		      <input type="hidden" name="id" value="'.$id.'">
                    </td>
                  </tr>
                  <tr>
                    <td>
		      <p>Имя: </p>
                    </td>
                    <td>
                      <input type="text" name="name" size="30" maxlength="30" value="'.$inf_arr['name'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Отчество: </p>
                    </td>
                    <td>
                      <input type="text" name="lastname" size="30" maxlength="30" value="'.$inf_arr['lastname'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Ваш телефон: </p>
                    </td>
                    <td>
                      <input type="text" name="mob" size="20" maxlength="25" value="'.$inf_arr['mob'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Ваш E-mail: </p>
                    </td>
                    <td>
                      <input type="text" name="mail" size="30" maxlength="30" value="'.$inf_arr['mail'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Логин: </p>
                    </td>
                    <td>
                      <input type="text" name="login" size="20" maxlength="20" value="'.$inf_arr['login'].'"/>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
		      <p><input type="submit" value="Внести изменения" /></p>
		    </td>
                  </tr>         
                </table>
	      </form>';
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $myrow['title']; ?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>



<table border="0" align="center" width="800" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="header"  align="right" valign="bottom">
    <a href="index.php"><img src="img/<?php echo $header; ?>"/></a>
    <?php require_once "blocks/flag.php"; ?>
    </td>
  </tr>

  <tr>
    <td>
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" class="lefttd" valign="top">
            <!--Here is left panel-->
				<?php
				  require_once "blocks/script_pages.php";
				  require_once "blocks/entered.php";
				?>
          </td>
          
          <td align="center">
          	<!--Text main--><?php echo $text_main; ?>
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
  
  <tr>
    <td><img id="footer" src="img/<?php echo $footer; ?>" />
    </td>
  </tr>
</table>



</body>
</html>
