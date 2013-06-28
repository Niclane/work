<?php 
  if (!isset($_COOKIE['logged']) or $_COOKIE['logged']!="in") {
    echo "Wrong page!<a href='index.php'>Return to main page</a>";
    exit();
  }
  $hello=$_COOKIE['login'];
  require_once "blocks/bd.php";
  $role=mysql_query("SELECT role,id FROM users WHERE login='$hello'",$db);
  $rowrole=mysql_fetch_array($role);
  if ($rowrole['role']!='admin') {
    echo "Wrong page!<a href='index.php'>Return to main page</a>";
    exit();
  }



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
  
  
  // Making form of a new in $text_main
  $res=mysql_query("SELECT title_new,author,news.id,login FROM news JOIN users ON users.id=news.author",$db);
  $idUs=0;
  $text_main='<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">';
  while ($row=mysql_fetch_array($res)) {
	if ($idUs!=$row['author']) {
		$text_main=$text_main.'<tr><td colspan="2" align="center"><strong>'.$row['login'].'</strong></td></tr>';
		$text_main=$text_main.'<tr><td>'.$row['title_new'].'</td><td align="right"><a href="change_one.php?id='.$row['id'].'">Змінити</a></td></tr>';
	} else {
		$text_main=$text_main.'<tr><td>'.$row['title_new'].'</td><td align="right"><a href="change_one.php?id='.$row['id'].'">Змінити</a></td></tr>';
	}
	$idUs=$row['author'];
		
  }
  $text_main=$text_main.'</table>';
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
  
  // Making form of a new in $text_main
  $res=mysql_query("SELECT title_new,author,news.id,login FROM news JOIN users ON users.id=news.author",$db);
  $idUs=0;
  $text_main='<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">';
  while ($row=mysql_fetch_array($res)) {
	if ($idUs!=$row['author']) {
		$text_main=$text_main.'<tr><td colspan="2" align="center"><strong>'.$row['login'].'</strong></td></tr>';
		$text_main=$text_main.'<tr><td>'.$row['title_new'].'</td><td align="right"><a href="change_one.php?id='.$row['id'].'">Change</a></td></tr>';
	} else {
		$text_main=$text_main.'<tr><td>'.$row['title_new'].'</td><td align="right"><a href="change_one.php?id='.$row['id'].'">Change</a></td></tr>';
	}
	$idUs=$row['author'];
		
  }
  $text_main=$text_main.'</table>';
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
  
  // Making form of a new in $text_main
  $res=mysql_query("SELECT title_new,author,news.id,login FROM news JOIN users ON users.id=news.author",$db);
  $idUs=0;
  $text_main='<table width="400" align="center" border="0" cellpadding="0" cellspacing="0" class="border_reg">';
  while ($row=mysql_fetch_array($res)) {
	if ($idUs!=$row['author']) {
		$text_main=$text_main.'<tr><td colspan="2" align="center"><strong>'.$row['login'].'</strong></td></tr>';
		$text_main=$text_main.'<tr><td>'.$row['title_new'].'</td><td align="right"><a href="change_one.php?id='.$row['id'].'">Редактировать</a></td></tr>';
	} else {
		$text_main=$text_main.'<tr><td>'.$row['title_new'].'</td><td align="right"><a href="change_one.php?id='.$row['id'].'">Редактировать</a></td></tr>';
	}
	$idUs=$row['author'];
		
  }
  $text_main=$text_main.'</table>';
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $inf_arr['title_new']; ?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>



<table border="0" align="center" width="800" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="header" align="right" valign="bottom">
    <a href="index.php"><img src="img/<?php echo $header; ?>"/></a>
    <?php require_once "blocks/flag.php"; ?>
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
            	<td><!--Text main--><?php echo $text_main; ?></td>
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
