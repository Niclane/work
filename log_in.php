<?php
require_once "blocks/bd.php";
$login=$_POST['login']; $login=trim($login); $login=htmlspecialchars($login);
$pass=$_POST['pass']; $pass=htmlspecialchars($pass);
$result=mysql_query("SELECT login,pass,surname,name,lastname FROM users WHERE login='$login'",$db);
$myrow=mysql_fetch_array($result);
if ($myrow) {
	if ($pass==$myrow['pass']) {
	SetCookie("logged","in",mktime(0,0,0,01,25,2025));
	SetCookie("login","$login",mktime(0,0,0,01,25,2025));
	$cook=1;
	} else $cook=0;
} else $log=0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>���������</title>
</head>
<body>
<?php
if (isset ($log) and $log==0) { if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "����, ���� �� ����� �� ����<br><a href='index.php'>����������� �� ������� �������</a>";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Login you entered doesn&apos;t exist<br><a href='index.php'>Return to the main page</a>";
								if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "�����, ������� �� ����� �� ����������<br><a href='index.php'>��������� �� ������� ��������</a>";
								exit();
							   }
if ($cook==1) {
	if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "�� ������<br><a href='index.php'>����������� �� ������� �������</a>";
	if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "You entered<br><a href='index.php'>Return to the main page</a>";
	if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "�� �����<br><a href='index.php'>��������� �� ������� ��������</a>";
}
if ($cook==0) {
	if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo"������ ������, ��������� �� ���!<br><a href='index.php'>����������� �� ������� �������</a>";
	if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo"Wrong password, please try again!<br><a href='index.php'>Return to the main page</a>";
	if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo"�������� ������, ���������� ��� ���!<br><a href='index.php'>��������� �� ������� ��������</a>";
} 
 ?>
</body>
</html>