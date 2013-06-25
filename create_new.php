<?php 
if (!isset($_COOKIE['logged'])) header("Location: index.php");
if ($_COOKIE['logged']!="in") header("Location: index.php");
require_once "blocks/bd.php";
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title,header,footer FROM ua WHERE page='create_new'",$db);
  $myrow=mysql_fetch_array($result);
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT title,header,footer FROM en WHERE page='create_new'",$db);
  $myrow=mysql_fetch_array($result);
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT title,header,footer FROM ru WHERE page='create_new'",$db);
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
          	<form action="insert_new.php" method="post">
                  <table width="450" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
                	<tr>
                    	<td>
                        	<p>
                             <?php
								if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Назва новини: ";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Title of new: ";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Назва новости: ";
							 ?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="text" name="title_new" size="40" maxlength="255" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>
                            <?php
								if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Текст новини: ";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Text of new: ";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Текст новости: ";
							 ?>
                            </p>
                        </td>
                        
                        <td>
                        	<textarea name="text_new" cols="30" rows="10" wrap="virtual"></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2" align="center"><p><input type="submit" value="<?php
								if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Додати новину";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Add new";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Добавить новость";
							 ?>" /></p></td>
                        <td></td>
                    </tr>         
                </table>
             </form>
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
