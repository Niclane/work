<?php 
require_once "blocks/bd.php";
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title,header,text_main,footer FROM ua WHERE page='use_site'",$db);
  $myrow=mysql_fetch_array($result);
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT title,header,text_main,footer FROM en WHERE page='use_site'",$db);
  $myrow=mysql_fetch_array($result);
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT title,header,text_main,footer FROM ru WHERE page='use_site'",$db);
  $myrow=mysql_fetch_array($result);
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title><?php echo $myrow['title']; ?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>



<table border="0" align="center" width="800" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="header" align="right" valign="bottom"><?php echo $myrow['header']; require_once "blocks/flag.php"; ?>
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
            	<td><?php echo $myrow['text_main']; ?></td>
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
