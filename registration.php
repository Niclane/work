<?php 
require_once "blocks/bd.php";
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title,header,text_main,footer FROM ua WHERE page='registration'",$db);
  $myrow=mysql_fetch_array($result);
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT title,header,text_main,footer FROM en WHERE page='registration'",$db);
  $myrow=mysql_fetch_array($result);
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT title,header,text_main,footer FROM ru WHERE page='registration'",$db);
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
    <td class="header"  align="right" valign="bottom"><?php echo $myrow['header']; require_once "blocks/flag.php"; ?>
    </td>
  </tr>

  <tr>
    <td>
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" class="lefttd" valign="top">
            <!--Here is left panel-->
				<?php require_once "blocks/script_pages.php"; ?>
          </td>
          
          <td align="center">
          	<h2 align="center"><?php echo $myrow['text_main']; ?></h1>
          	<form action="reg_bd.php" method="post">
            	<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">
                	<tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "�������: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Surname: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "�������: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="text" name="surname" size="30" maxlength="30" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "��&apos;�: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Name: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "���: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="text" name="name" size="30" maxlength="30" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "��-�������: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Middle name: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "��������: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="text" name="lastname" size="30" maxlength="30" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "��� �������: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Your mobile number: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "��� �������: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="text" name="mob" size="20" maxlength="25" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "��� E-mail: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Your E-mail: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "��� E-mail: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="text" name="mail" size="30" maxlength="30" />
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "����: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Login: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "�����: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="text" name="login" size="20" maxlength="20" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "������: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Password: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "������: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="password" name="pass1" size="20" maxlength="20" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>
                            	<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "�������� ������: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Reenter Password: ";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "��������� ������: ";
								?>
                            </p>
                        </td>
                        
                        <td>
                        	<input type="password" name="pass2" size="20" maxlength="20" />
                        </td>
                    </tr>    
                    <tr>
                    	<td colspan="2" align="center"><p><input type="submit" value="<?php
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "��������������";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Sign up";
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "������������������";
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
    <td><?php echo $myrow['footer']; ?>
    </td>
  </tr>
</table>



</body>
</html>
