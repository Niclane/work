<?php 
if (isset($_POST['title_new'])) {
  $title_new=$_POST['title_new'];
  if ($title_new=="") {
  		if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели назву новини, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";  
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered a title of new, please return to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели имя новости, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
	exit();
  }
  $title_new=htmlspecialchars($title_new);
}

if (isset($_POST['text_new'])) {
  $text_new=$_POST['text_new'];
  if ($text_new=="") {
  		if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, але ви не ввели текст новини, поверніться на попередню сторінку і заповніть всі поля</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered a text of new, please return to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, но вы не ввели текст новости, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
	exit();
  }
  $text_new=htmlspecialchars($text_new);
}

if (!isset($_POST['title_new']) or !isset($_POST['text_new'])) {
		if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Вибачте, сталася помилка, поверніться на попередню сторінку і спробуйте ще раз!</p><input name='back' type='button' value='Повернутись на попередню сторінку' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, an error occurred, please return to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
		if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Извините, возникла ошибка, вернитесь на предыдущую страницу и заполните все поля</p><input name='back' type='button' value='Вернуться на предыдущую страницу' onclick='javascript:self.back();'>";
exit();
}

require_once "blocks/bd.php";
$login=$_COOKIE['login'];
$get_names=mysql_query("SELECT surname,name,lastname,mob,mail FROM users WHERE login='$login'",$db);
$other_names=mysql_fetch_array($get_names);
$author=$other_names['surname']." ".$other_names['name']." ".$other_names['lastname']." "."($login)";
$add_date=date("Y-m-d");
$mob=$other_names['mob'];
$mail=$other_names['mail'];
$result=mysql_query("INSERT INTO news (title_new,text_new,author,date,mob,mail) VALUES ('$title_new','$text_new','$author','$add_date','$mob','$mail')");
header("Location: index.php");
?>