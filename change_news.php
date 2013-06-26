<?php
require_once "blocks/bd.php";
if (!isset($_COOKIE['login']) || $_COOKIE['login']=="") 
  header("Location: index.php");
  
$logina=$_COOKIE['login'];
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT header,footer FROM ua WHERE page='about_us'",$db);
  $myrow=mysql_fetch_array($result);
  $redacting="Тут редагуються новини";
  $change="редагувати";
  $delete="видалити";
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT header,footer FROM en WHERE page='about_us'",$db);
  $myrow=mysql_fetch_array($result);
  $redacting="Here the news are changing";
  $change="change";
  $delete="delete";
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT header,footer FROM ru WHERE page='about_us'",$db);
  $myrow=mysql_fetch_array($result);
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
    <td class="header" align="right" valign="bottom"><?php 
						echo $myrow['header']; 
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
    <td><?php echo $myrow['footer']; ?></td>
  </tr>
</table>



</body>
</html>
