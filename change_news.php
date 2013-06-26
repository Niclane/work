<?php
require_once "blocks/bd.php";
if (!isset($_COOKIE['login']) || $_COOKIE['login']=="") 
  header("Location: index.php");
  
$logina=$_COOKIE['login'];
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  
  // Selecting header for ua
  $head=mysql_query("SELECT ua FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead[ua];
  
  // Selecting footer for ua
  $foot=mysql_query("SELECT ua FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot[ua];
  
  $redacting="Тут редагуються новини";
  $change="редагувати";
  $delete="видалити";
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  // Selecting header for en
  $head=mysql_query("SELECT en FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead[en];
  
  // Selecting footer for en
  $foot=mysql_query("SELECT en FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot[en];
  
  $redacting="Here the news are changing";
  $change="change";
  $delete="delete";
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  // Selecting header for ru
  $head=mysql_query("SELECT ru FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead[ru];
  
  // Selecting footer for ru
  $foot=mysql_query("SELECT ru FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot[ru];
  
  $redacting="Здесь редактируются новости";
  $change="редактировать";
  $delete="удалить";
}


$role=mysql_query("SELECT role FROM users WHERE login='$logina'",$db);
$rowrole=mysql_fetch_array($role);
if ($rowrole['role']=="admin") {
  $adm=mysql_query("SELECT title_new,id FROM news ORDER BY id DESC",$db);
  $show="";
  while ($arradm=mysql_fetch_array($adm)) {
    $show=$show."<tr><td>".$arradm['title_new']."</td><td align='right'><a href=\"change_one.php?id=".$arradm[id]."\"> ".$change."</a> \ <a href=\"delete_one.php?id=".$arradm[id]."\">".$delete."</a></td></tr>";
  }
}
elseif($rowrole['role']=="meneger") {
  $meneg=mysql_query("SELECT title_new,id FROM news ORDER BY id DESC",$db);
  $show="";
  while ($arrmeneg=mysql_fetch_array($meneg)) {
    $show=$show.$arrmeneg['title_new']."<a href=\"change_one.php?id=".$arrmeneg[id]."\"> ".$change."</a><br>";
  }
}
else {
  $show="Поверніться на головну сторінку, Вам заборонено тут перебувати!";
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $myrow['title']; ?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>



<table border="0" align="center" width="800" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="header" align="right" valign="bottom"> 
    <a href="index.php"><img src="img/<?php echo $header; ?>"/></a>
	<?php
	  require_once "blocks/flag.php";
	?>
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
            	<td><!--text main--><table width="90%" align="center"><tr><td colspan="2" align="center"><?php echo $redacting; ?></td></tr><?php echo $show; ?></table></td>
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
