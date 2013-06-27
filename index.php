<?php
  require_once "blocks/bd.php";
  
  // Connecting necessary language.
  if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") {
    $result=mysql_query("SELECT title,text_main FROM ua WHERE page='index'",$db);
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
    $result=mysql_query("SELECT title,text_main FROM en WHERE page='index'",$db);
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
    $result=mysql_query("SELECT title,text_main FROM ru WHERE page='index'",$db);
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
  
  // Getting a variable that contain number of page.
  if (!isset($_GET['page'])) {
    $page=1;
  }
  else {
    $page=$_GET['page'];
  }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title><?php echo $myrow['title']; ?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>



<table border="0" align="center" width="800" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="header" align="right" valign="bottom">
    <a href="index.php"><img src="img/<?php echo $header; ?>"/></a>
    <?php  
	require_once "blocks/flag.php"; ?>    </td>
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
          
          <td align="center"><h3><?php echo $myrow['text_main'];?></h3><br>
			<!--inserting news-->
            <?php require_once "blocks/news.php"; ?>
            <!--View number of pages-->
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td align="center">
                    	<?php
							$res=mysql_query("SELECT COUNT(*) FROM news");
							$row=mysql_fetch_row($res);
							$total=$row[0]; //number of news
							if ($total%3!=0) $n=floor($total/3)+1; else $n=floor($total/3); //we got the number of pages							
							
	//making the number of pages						
switch($n) {
case 2: if ($page==1) echo "<a href='index.php?page=1'><strong>1</strong></a> <a href='index.php?page=2'>2</a>";
		else echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'><strong>2</strong></a>";
break; 
case 3: if ($page==1) echo "<a href='index.php?page=1'><strong>1</strong></a> <a href='index.php?page=2'>2</a> <a href='index.php?page=3'>3</a>";
		if ($page==2) echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'><strong>2</strong></a> <a href='index.php?page=3'>3</a>";
		if ($page==3) echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'>2</a> <a href='index.php?page=3'><strong>3</strong></a>";
break;
case 4: 
	if ($page==1) echo "<a href='index.php?page=1'><strong>1</strong></a> <a href='index.php?page=2'>2</a> ... <a href='index.php?page=4'>4</a>";
	if ($page==4) echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=3'>3</a> <a href='index.php?page=4'><strong>4</strong></a>";
	if ($page==2) echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'><strong>2</strong></a> <a href='index.php?page=3'>3</a> <a href='index.php?page=4'>4</a>";
	if ($page==3) echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'>2</a> <a href='index.php?page=3'><strong>3</strong></a> <a href='index.php?page=4'>4</a>";
break;
case 5: 
	switch($page) {
	case 1: echo "<a href='index.php?page=1'><strong>1</strong></a> <a href='index.php?page=2'>2</a> ... <a href='index.php?page=5'>5</a>";
	break;
	case 2: echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'><strong>2</strong></a> <a href='index.php?page=3'>3</a> ... <a href='index.php?page=5'>5</a>";
	break;
	case 3: echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'>2</a> <a href='index.php?page=3'><strong>3</strong></a> <a href='index.php?page=4'>4</a> <a href='index.php?page=5'>5</a>";
	break;
	case 4: echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=3'>3</a> <a href='index.php?page=4'><strong>4</strong></a> <a href='index.php?page=5'>5</a>";
	break;
	case 5: echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=4'>4</a> <a href='index.php?page=5'><strong>5</strong></a>";
	break;
	}
break;
case 6: 
	switch($page) {
		case 1: echo "<a href='index.php?page=1'><strong>1</strong></a> <a href='index.php?page=2'>2</a> ... <a href='index.php?page=6'>6</a>";
		break;
		case 2: echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'><strong>2</strong></a> <a href='index.php?page=3'>3</a> ... <a href='index.php?page=6'>6</a>";
		break;
		case 3: echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'>2</a> <a href='index.php?page=3'><strong>3</strong></a> <a href='index.php?page=4'>4</a> ... <a href='index.php?page=6'>6</a>";
		break;
		case 4: echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=3'>3</a> <a href='index.php?page=4'><strong>4</strong></a> <a href='index.php?page=5'>5</a> <a href='index.php?page=6'>6</a>";
		break;
		case 5: echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=4'>4</a> <a href='index.php?page=5'><strong>5</strong></a> <a href='index.php?page=6'>6</a>";
		break;
		case 6: echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=5'>5</a> <a href='index.php?page=6'><strong>6</strong></a>";
		break;
	}
break;
case $n>6:
	 switch($page) {
		case 1: echo "<a href='index.php?page=1'><strong>1</strong></a> <a href='index.php?page=2'>2</a> ... <a href='index.php?page=$n'>$n</a>";
		break;
		case 2: echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'><strong>2</strong></a> <a href='index.php?page=3'>3</a> ... <a href='index.php?page=$n'>$n</a>";
		break;
		case 3: echo "<a href='index.php?page=1'>1</a> <a href='index.php?page=2'>2</a> <a href='index.php?page=3'><strong>3</strong></a> <a href='index.php?page=4'>4</a> ... <a href='index.php?page=$n'>$n</a>";
		break;
		case ($page>3 and $page<($n-2)): echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=".($page-1)."'>".($page-1)."</a> <a href='index.php?page=$page'><strong>".$page."</strong></a> <a href='index.php?page=".($page+1)."'>".($page+1)."</a> ... <a href='index.php?page=$n'>$n</a>";
		break;
		case ($n-2): echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=".($n-3)."'>".($n-3)."</a> <a href='index.php?page=".($n-2)."'><strong>".($n-2)."</strong></a> <a href='index.php?page=".($n-1)."'>".($n-1)."</a> <a href='index.php?page=".$n."'>".$n."</a>";
		break;
		case ($n-1): echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=".($page-1)."'><strong>".($page-1)."</strong></a> <a href='index.php?page=$page'>".$page."</a> <a href='index.php?page=".($page+1)."'>".($page+1)."</a>";
		break;
		case $n: echo "<a href='index.php?page=1'>1</a> ... <a href='index.php?page=".($page-1)."'>".($page-1)."</a> <a href='index.php?page=$page'><strong>".$page."</strong></a>";
		break;
	  }
break;
}
						 ?>
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
