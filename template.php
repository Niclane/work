<?php 
require_once "blocks/bd.php";
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title,header,footer FROM langs WHERE page='index' AND lang='ua'",$db);
  $myrow=mysql_fetch_array($result);
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT title,header,footer FROM langs WHERE page='index' AND lang='en'",$db);
  $myrow=mysql_fetch_array($result);
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT title,header,footer FROM langs WHERE page='index' AND lang='ru'",$db);
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
    <td><?php echo $myrow['header']; ?>
    <a href="set_cookie.php?lang=en">скріпт en</a>
    <a href="set_cookie.php?lang=ua">скріпт ua</a>
    <a href="set_cookie.php?lang=ru">скріпт ru</a>
    </td>
  </tr>

  <tr>
    <td>
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250">
            <form>
              <table width="250" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>Логін:</td>
                  <td align="right"><input type="text" name="login" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td>Пароль:</td>
                  <td align="right"><input type="password" name="login" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td>реєстрація</td>
                  <td align="right"><input type="submit" value="Вхід" /></td>
                </tr>
              </table>
            </form>
          </td>
          
          <td align="center">main</td>
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
