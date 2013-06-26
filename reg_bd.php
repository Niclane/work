<?php 
require_once "blocks/bd.php";
//connecting necessary language
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
  $result=mysql_query("SELECT title,header,footer FROM ua WHERE page='reg_bd'",$db);
  $myrow=mysql_fetch_array($result);
}

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") {
  $result=mysql_query("SELECT title,header,footer FROM en WHERE page='reg_bd'",$db);
  $myrow=mysql_fetch_array($result);
} 

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") {
  $result=mysql_query("SELECT title,header,footer FROM ru WHERE page='reg_bd'",$db);
  $myrow=mysql_fetch_array($result);
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
    <td><?php echo $myrow['header']; ?></td>
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
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå âè íå ââåëè âàøå ïð³çâèùå, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your surname, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî âû íå ââåëè âàøó ôàìèëèþ, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
					 exit();
					}
					$surname=htmlspecialchars($surname);
				}
				
				if (isset($_POST['name'])) {$name=$_POST['name']; $name=trim($name);
					if ($name=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå âè íå ââåëè âàøå ³ì&apos;ÿ, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your name, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî âû íå ââåëè âàøå èìÿ, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
					 exit();
					}
					$name=htmlspecialchars($name);
				}
				
				if (isset($_POST['lastname'])) {$lastname=$_POST['lastname']; $lastname=trim($lastname);
					if ($lastname=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå âè íå ââåëè ïî-áàòüêîâ³, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your middle name, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî âû íå ââåëè âàøå îò÷åñòâî, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
					 exit();
					}
					$lastname=htmlspecialchars($lastname);
				}
				
				if (isset($_POST['mob'])) {$mob=$_POST['mob'];
					if ($mob=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå âè íå ââåëè íîìåðà òåëåôîíó, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your mobile number, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî âû íå ââåëè âàø íîìåð òåëåôîíà, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
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
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå âè íå ââåëè E-mail, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your E-mail, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî âû íå ââåëè âàø E-mail, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
					 exit();
					}
					$mail=htmlspecialchars($mail);
				}		
				
				if (isset($_POST['login'])) {$login=$_POST['login']; $login=trim($login);
					if ($login=="") {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå âè íå ââåëè ëîã³í, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, but you have not entered your login, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî âû íå ââåëè âàø ëîãèí, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
					 exit();
					}
					$login=htmlspecialchars($login);
				}			
				
				if (isset($_POST['pass1']) and isset($_POST['pass2'])) {$pass1=$_POST['pass1'];	$pass2=$_POST['pass2'];
					if ($pass1!=$pass2) {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå âè íåïðàâèëüíî ââåëè ïàðîëü, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, you entered an incorrect password, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî âû íåïðàâèëüíî ââåëè âàø ïàðîëü, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
					 exit();
					}
					$pass=htmlspecialchars($pass1);
				}	
				
				//connecting to bd
				require_once "blocks/bd.php";
				$result=mysql_query("SELECT login FROM users",$db);
				while($myrow=mysql_fetch_array($result)) {
					if ($login==$myrow['login']) {
							if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "<p style='color:#FF0000; font-size:18px;'>Âèáà÷òå, àëå êîðèñòóâà÷ ç òàêèì ëîã³íîì âæå ³ñíóº, ïîâåðí³òüñÿ íà ïîïåðåäíþ ñòîð³íêó ³ çàïîâí³òü âñ³ ïîëÿ</p><input name='back' type='button' value='Ïîâåðíóòèñü íà ïîïåðåäíþ ñòîð³íêó' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "<p style='color:#FF0000; font-size:18px;'>Sorry, a user with this login already exists, go back to the previous page and fill in all fields</p><input name='back' type='button' value='Back to previous page' onclick='javascript:self.back();'>";
							if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "<p style='color:#FF0000; font-size:18px;'>Èçâèíèòå, íî ïîëüçîâàòåëü ñ òàêèì ëîãèíîì óæå ñóùåñòâóåò, âåðíèòåñü íà ïðåäûäóùóþ ñòðàíèöó è çàïîëíèòå âñå ïîëÿ</p><input name='back' type='button' value='Âåðíóòüñÿ íà ïðåäûäóùóþ ñòðàíèöó' onclick='javascript:self.back();'>";
					 exit();}
				}
				$insert=mysql_query("INSERT INTO users (surname,name,lastname,mob,mail,login,pass) VALUES ('$surname','$name','$lastname','$mob','$mail','$login','$pass')");
				if ($insert){
						if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Âè óñï³øíî çàðåºñòðóâàëèñÿ<br><a align='center' href='index.php'>Ïîâåðíóòèñÿ íà ãîëîâíó ñòîð³íêó</a>";
						if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "You have successfully registered<br><a align='center' href='index.php'>Back to main page</a>";
						if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Âû óñïåøíî çàðåãèñòðèðîâàëèñü<br><a align='center' href='index.php'>Âåðíóòüñÿ íà ãëàâíóþ ñòðàíèöó</a>";
				
				} 
				else {
					if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo "Âèáà÷òå, ðåºñòðàö³ÿ íåâäàëà, ñïðîáóéòå ùå ðàç: <a href='registration.php'>Ïîâåðíóòèñÿ íà ñòîð³íêó ðåºñòðàö³¿</a>";
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo "Sorry, registration failed, please try again: <a href='registration.php'>Back to register page</a>";
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo "Èçâèíèòå, ðåãèñòðàöèÿ íåóäà÷íà, ïîïðîáóéòå åùå ðàç: <a href='registration.php'>Âåðíóòüñÿ íà ñòðàíèöó ðåãèñòðàöèè</a>";
				
				}
			?>
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
