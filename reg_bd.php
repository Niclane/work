<?php 
require_once "blocks/bd.php";
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title FROM ua WHERE page='reg_bd'",$db);
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
  $result=mysql_query("SELECT title FROM en WHERE page='reg_bd'",$db);
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
  $result=mysql_query("SELECT title FROM ru WHERE page='reg_bd'",$db);
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
    <td><a href="index.php"><img src="img/<?php echo $header; ?>"/></a></td>
  </tr>

  <tr>
    <td>
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250">
          </td>
          
          <td align="center">
          	<?php 
				if (isset($_POST['surname'])) {$surname=$_POST['surname']; $surname=trim($surname);
					if ($surname=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели ваше прізвище, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your surname, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели вашу фамилию, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();
					}
					$surname=htmlspecialchars($surname);
				}
				
				if (isset($_POST['name'])) {$name=$_POST['name']; $name=trim($name);
					if ($name=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели ваше ім&apos;я, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your name, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели ваше имя, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();
					}
					$name=htmlspecialchars($name);
				}
				
				if (isset($_POST['lastname'])) {$lastname=$_POST['lastname']; $lastname=trim($lastname);
					if ($lastname=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели по-батькові, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your middle name, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели ваше отчество, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();
					}
					$lastname=htmlspecialchars($lastname);
				}
				
				if (isset($_POST['mob'])) {$mob=$_POST['mob'];
					if ($mob=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели номера телефону, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your mobile number, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели ваш номер телефона, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();
					}
					$mob=htmlspecialchars($mob);
				}
				
				if (isset($_POST['mail'])) {
				$mail=$_POST['mail'];
				//checking wright-written mail
				$errMail=1;
				$arrMail=explode("@",$mail);
				if (count($arrMail)==2 && $arrMail[0]!="" && $arrMail[1]!="") {
					$arrPoint=explode(".",$arrMail[1]);
					if (count($arrPoint)<2 || $arrPoint[0]=="" && $arrPoint[1]=="") $errMail=0;
				}
				else $errMail=0;
				
				
					if ($mail=="" || $errMail==0) {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели E-mail, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your E-mail, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели ваш E-mail, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();
					}
					$mail=htmlspecialchars($mail);
				}		
				
				if (isset($_POST['login'])) {$login=$_POST['login']; $login=trim($login);
					if ($login=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели логін, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your login, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели ваш логин, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();
					}
					$login=htmlspecialchars($login);
				}			
				
				if (isset($_POST['pass1']) and isset($_POST['pass2'])) {$pass1=$_POST['pass1'];	$pass2=$_POST['pass2'];
					if ($pass1!=$pass2) {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви неправильно ввели пароль, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, you entered an incorrect password, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы неправильно ввели ваш пароль, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();
					}
					$pass=htmlspecialchars($pass1);
				}	
				
				//connecting to bd
				require_once "blocks/bd.php";
				$result=mysql_query("SELECT login FROM users",$db);
				while($myrow=mysql_fetch_array($result)) {
					if ($login==$myrow['login']) {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але користувач з таким логіном вже існує, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, a user with this login already exists, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но пользователь с таким логином уже существует, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
					 exit();}
				}
				$insert=mysql_query("INSERT INTO users (surname,name,lastname,mob,mail,login,pass) VALUES ('$surname','$name','$lastname','$mob','$mail','$login','$pass')");
				if ($insert){
						if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Ви успішно зареєструвалися<br><a align='center' href='index.php'>Повернутися на головну сторінку</a>";
						if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "You have successfully registered<br><a align='center' href='index.php'>Back to main page</a>";
						if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Вы успешно зарегистрировались<br><a align='center' href='index.php'>Вернуться на главную страницу</a>";
				
				} 
				else {
					if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Вибачте, реєстрація невдала, спробуйте ще раз: <a href='registration.php'>Повернутися на сторінку реєстрації</a>";
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Sorry, registration failed, please try again: <a href='registration.php'>Back to register page</a>";
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Извините, регистрация неудачна, попробуйте еще раз: <a href='registration.php'>Вернуться на страницу регистрации</a>";
				
				}
			?>
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
