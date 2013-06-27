<?php 
require_once "blocks/bd.php";
if (!isset($_GET['id'])) {
  echo "Вибачте, але ви неправильно зайшли на цю сторінку <a href='index.php'>Повернутись на головну сторінку</a>";
  exit();
}
$id=$_GET['id'];
$user_inf=mysql_query("SELECT title_new,date,author,user_img,text_new,mob,mail FROM news WHERE id='$id'",$db);
$inf_arr=mysql_fetch_array($user_inf);

// Making image
  if ($inf_arr['user_img']!="") {
    $size=getimagesize($inf_arr['user_img']);
    if ($size[0]>450 || $size[1]>450)
    $img="<img height='400' width='500' align='center' src=".$inf_arr['user_img'].">";
    else $img="<img align='center' src=".$inf_arr['user_img'].">";
  }
else {
  $img="";
}



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
  
  // Making form of a new in $text_main
  $text_main='<table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<h2 class="news_name" align="center">'.$inf_arr['title_new'].'</h2>
    <p class="news_adds"><strong>Дата створення новини:</strong> '.$inf_arr['date'].'</p>
    <p class="news_adds"><strong>Автор:</strong> '.$inf_arr["author"].'</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	<!--$img--><div align="center">'.$img.'</div>
	  <p>'.$inf_arr["text_new"].'</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Телефон: '.$inf_arr["mob"].'
	</td>
    <td class="news_title">E-mail: '.$inf_arr["mail"].'</td>
</tr>
</table>';
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
  
  // Making form of a new in $text_main
  $text_main='<table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<h2 class="news_name" align="center">'.$inf_arr['title_new'].'</h2>
    <p class="news_adds"><strong>Created:</strong> '.$inf_arr['date'].'</p>
    <p class="news_adds"><strong>Author:</strong> '.$inf_arr["author"].'</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	<!--$img--><div align="center">'.$img.'</div>
	  <p>'.$inf_arr["text_new"].'</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Mobile: '.$inf_arr["mob"].'
	</td>
    <td class="news_title">E-mail: '.$inf_arr["mail"].'</td>
</tr>
</table>';
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
  
  // Making form of a new in $text_main
  $text_main='<table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<h2 class="news_name" align="center">'.$inf_arr['title_new'].'</h2>
    <p class="news_adds"><strong>Дата создания новости:</strong> '.$inf_arr['date'].'</p>
    <p class="news_adds"><strong>Автор:</strong> '.$inf_arr["author"].'</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	<!--$img--><div align="center">'.$img.'</div>
	  <p>'.$inf_arr["text_new"].'</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Телефон: '.$inf_arr["mob"].'
	</td>
    <td class="news_title">E-mail: '.$inf_arr["mail"].'</td>
</tr>
</table>';
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
