<?php 
if (!isset($_COOKIE['logged'])) header("Location: index.php");
if ($_COOKIE['logged']!="in") header("Location: index.php");
require_once "blocks/bd.php";
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title FROM ua WHERE page='create_new'",$db);
  $myrow=mysql_fetch_array($result);
  
  // Selecting header for ua
  $head=mysql_query("SELECT ua FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['ua'];
  
  // Selecting footer for ua
  $foot=mysql_query("SELECT ua FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['ua'];
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT title FROM en WHERE page='create_new'",$db);
  $myrow=mysql_fetch_array($result);
  
  // Selecting header for en
  $head=mysql_query("SELECT en FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['en'];
  
  // Selecting footer for en
  $foot=mysql_query("SELECT en FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['en'];
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT title FROM ru WHERE page='create_new'",$db);
  $myrow=mysql_fetch_array($result);
  
  // Selecting header for ru
  $head=mysql_query("SELECT ru FROM headers",$db);
  $arrHead=mysql_fetch_array($head);
  $header=$arrHead['ru'];
  
  // Selecting footer for ru
  $foot=mysql_query("SELECT ru FROM footers",$db);
  $arrFoot=mysql_fetch_array($foot);
  $footer=$arrFoot['ru'];
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
          	<form action="insert_new.php" method="post" enctype="multipart/form-data">
                  <table width="450" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
                	<tr>
                    	<td>
                        	<p><?php
								if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Назва новини: ";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Title of new: ";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Назва новости: ";
							 ?></p>
                        </td>
                        
                        <td>
                        	<input type="text" name="title_new" size="40" maxlength="255" />
                        </td>
                    </tr>
		    <tr>
		    <td><p>Вставити зображення: (maxsize 450 x 450)</p></td>
		    <td><input type="file" name="filename" /></td>
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
    <td><img id="footer" src="img/<?php echo $footer; ?>" /></td>
  </tr>
</table>



</body>
</html>
