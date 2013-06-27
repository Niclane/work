<?php
if (!isset($_GET['id'])) header("Location: index.php");
$id=$_GET['id'];
require_once "blocks/bd.php";

// Checking wright login

if (!isset($_COOKIE['login'])) header("Location: index.php");
$logina=$_COOKIE['login'];
$role=mysql_query("SELECT role FROM users WHERE login='$logina'",$db);
$rowrole=mysql_fetch_array($role);
if ($rowrole['role']!="admin" && $rowrole['role']!="meneger") header("Location: index.php");

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
}
$new=mysql_query("SELECT title_new,text_new FROM news WHERE id='$id'",$db);
$arrnew=mysql_fetch_array($new);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Зміна новини</title>
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
            	<td><!--text_main-->
		<form action="update_one.php" method="post">
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
                        	<input type="text" name="title_new" size="40" maxlength="255" value="<?php echo $arrnew[title_new]; ?>"/>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
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
                        	<textarea name="text_new" cols="30" rows="10" wrap="virtual"><?php echo $arrnew[text_new]; ?></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2" align="center"><p><input type="submit" value="<?php
								if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Змінити новину";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Change new";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Сменить новость";
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
      </table>
      
    </td>
  </tr>
  
  <tr>
    <td><img id="footer" src="img/<?php echo $footer; ?>" /></td>
  </tr>
</table>



</body>
</html>
