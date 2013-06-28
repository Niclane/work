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
$user_inf=mysql_query("SELECT surname,name,lastname,mob,mail,login,user_img,time_registered,time_logged FROM users WHERE id='$id'",$db);
$inf_arr=mysql_fetch_array($user_inf);
if ($inf_arr['user_img']!="") {
  $addToText='<tr align="center">
		<td colspan="2"><img src="'.$inf_arr['user_img'].'"></td>
	      </tr>';
} else {
  $addToText="";
}
$addDate=date("d.m.Y",$inf_arr['time_registered'])." ".date("H:i:s",$inf_arr['time_registered']);
$addTimeLogged=date("d.m.Y",$inf_arr['time_logged'])." ".date("H:i:s",$inf_arr['time_logged']);


//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  
  // Selecting header for ua
  $head=mysql_query("SELECT ua FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['ua'];
  
  // Selecting footer for ua
  $foot=mysql_query("SELECT ua FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['ua'];
  
  // Making form of a user in $text_main
  $text_main='<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
  '.$addToText.'
  <tr align="right">
    <td><p>Логін: </p></td>
    <td>'.$inf_arr['login'].'</td>
  </tr>
  <tr align="right">
    <td><p>Прізвище: </p></td>
    <td>'.$inf_arr['surname'].'</td>
  </tr>
  <tr align="right">
    <td><p>Ім&apos;я: </p></td>
    <td>'.$inf_arr['name'].'</td>
  </tr>
  <tr align="right">
    <td><p>По-батькові: </p></td>
    <td>'.$inf_arr['lastname'].'</td>
  </tr>
  <tr align="right">
    <td><p>Ваш телефон: </p></td>
    <td>'.$inf_arr['mob'].'</td>
  </tr>
  <tr align="right">
    <td><p>Ваш E-mail: </p></td>
    <td>'.$inf_arr['mail'].'</td>
  </tr>
  <tr align="right">
    <td><p>Час реєстрації: </p></td>
    <td>'.$addDate.'</td>
  </tr>
  <tr align="right">
    <td><p>Останній раз заходив на сайт: </p></td>
    <td>'.$addTimeLogged.'</td>
  </tr>
  <tr>
    <td align="left"><p><a href="delete_profile.php"><strong>Видалити свій профіль</strong></a></p></td>
    <td align="right"><p><a href="change_profile.php?id='.$id.'"><strong>Редагувати свій профіль</strong></a></p></td>
  </tr>
  </table>
  ';

}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  
  // Selecting header for en
  $head=mysql_query("SELECT en FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['en'];

  // Selecting footer for en
  $foot=mysql_query("SELECT en FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['en'];
  
  // Making form of a user in $text_main
  $text_main='<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
  '.$addToText.'
  <tr align="right">
    <td><p>Login: </p></td>
    <td>'.$inf_arr['login'].'</td>
  </tr>
  <tr align="right">
    <td><p>Surname: </p></td>
    <td>'.$inf_arr['surname'].'</td>
  </tr>
  <tr align="right">
    <td><p>Name: </p></td>
    <td>'.$inf_arr['name'].'</td>
  </tr>
  <tr align="right">
    <td><p>Middle name: </p></td>
    <td>'.$inf_arr['lastname'].'</td>
  </tr>
  <tr align="right">
    <td><p>Your mobile number: </p></td>
    <td>'.$inf_arr['mob'].'</td>
  </tr>
  <tr align="right">
    <td><p>Your E-mail: </p></td>
    <td>'.$inf_arr['mail'].'</td>
  </tr>
  <tr align="right">
    <td><p>Time registered: </p></td>
    <td>'.$addDate.'</td>
  </tr>
  <tr align="right">
    <td><p>Last time logined: </p></td>
    <td>'.$addTimeLogged.'</td>
  </tr>
  <tr>
    <td align="left"><p><a href="delete_profile.php"><strong>Delete my profile</strong></a></p></td>
    <td align="right"><p><a href="change_profile.php?id='.$id.'"><strong>Change my profile</strong></a></p></td>
  </tr>
  </table>
  ';
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  
  // Selecting header for ru
  $head=mysql_query("SELECT ru FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['ru'];
  
  // Selecting footer for ru
  $foot=mysql_query("SELECT ru FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['ru'];
  
  // Making form of a user in $text_main
  $text_main='<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
  '.$addToText.'
  <tr align="right">
    <td><p>Логин: </p></td>
    <td>'.$inf_arr['login'].'</td>
  </tr>
  <tr align="right">
    <td><p>Фамилия: </p></td>
    <td>'.$inf_arr['surname'].'</td>
  </tr>
  <tr align="right">
    <td><p>Имя: </p></td>
    <td>'.$inf_arr['name'].'</td>
  </tr>
  <tr align="right">
    <td><p>Отчество: </p></td>
    <td>'.$inf_arr['lastname'].'</td>
  </tr>
  <tr align="right">
    <td><p>Ваш телефон: </p></td>
    <td>'.$inf_arr['mob'].'</td>
  </tr>
  <tr align="right">
    <td><p>Ваш E-mail: </p></td>
    <td>'.$inf_arr['mail'].'</td>
  </tr>
  <tr align="right">
    <td><p>Время регистрации: </p></td>
    <td>'.$addDate.'</td>
  </tr>
  <tr align="right">
    <td><p>Последний раз заходил на сайт: </p></td>
    <td>'.$addTimeLogged.'</td>
  </tr>
  <tr>
    <td align="left"><p><a href="delete_profile.php"><strong>Удалить свой профиль</strong></a></p></td>
    <td align="right"><p><a href="change_profile.php?id='.$id.'"><strong>Редактировать свой профиль</strong></a></p></td>
  </tr>
  </table>
  ';
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $inf_arr['title_new']; ?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>



<table border="0" align="center" width="800" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="header" align="right" valign="bottom">
    <a href="index.php"><img src="img/<?php echo $header; ?>"/></a>
    <?php require_once "blocks/flag.php"; ?>
    </td>
  </tr>

  <tr>
    <td>
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" class="lefttd" valign="top">
            <?php require_once "blocks/script_pages.php";
		  require_once "blocks/entered.php";
			 ?>
          </td>
          
         <td align="center">
          	<table width="90%" align="center" cellpadding="0" cellspacing="0" border="0">
          	<tr>
            	<td><!--Text main--><?php echo $text_main; ?></td>
            </tr>
          	</table>
         </td>
        </tr>
      </table>
      
    </td>
  </tr>
  
  <tr>
    <td><img id="footer" src="img/<?php echo $footer; ?>" /></td>
  </tr>
</table>



</body>
</html>
