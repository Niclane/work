<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php 
	$mail="asdfs.a";
	$arrMail=explode("@",$mail);	
	if (count($arrMail)==2 && $arrMail[0]!="" && $arrMail[1]!="") {
		$arrPoint=explode(".",$arrMail[1]);
		if (count($arrPoint)==2 && $arrPoint[0]!="" && $arrPoint[1]!="") echo "good"; else echo "wrong mail";
	}
	else echo "wrong mail";
?>



<div align="right"><a href="sda">sdfsdfadads</a></div>
<div align="right"><a href="sda">ffffff</a></div>

<?php 
require_once "blocks/bd.php";
$result=mysql_query("SELECT title_new,date,author,text_new,mob,mail FROM news ORDER BY id DESC",$db);
while($myrow=mysql_fetch_array($result)) {
	printf('<table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<p class="news_name">%s</p>
    <p class="news_adds">���� ��������� ������: %s</p>
    <p class="news_adds">�����: %s</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	  <p>%s</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  �������: %s
	</td>
    <td class="news_title">E-mail: %s</td>
</tr>
</table>',$myrow['title_new'],$myrow['date'],$myrow['author'],$myrow['text_new'],$myrow['mob'],$myrow['mail']);
}	  
?>
          <table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<p class="news_name">Name</p>
    <p class="news_adds">����</p>
    <p class="news_adds">�����</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	  <p>�����</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  �������:
	</td>
    <td class="news_title">E-mail:</td>
</tr>
</table>



<form action="insert_new.php" method="post">
<table width="400" align="center" border="1" cellpadding="0" cellspacing="0" class="border_reg">
                	<tr>
                    	<td>
                        	<p>����� ������:</p>
                        </td>
                        
                        <td>
                        	<input type="text" name="surname" size="40" maxlength="255" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>����� ������:</p>
                        </td>
                        
                        <td>
                        	<textarea cols="30" rows="10" wrap="virtual"></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2" align="center"><p><input type="submit" value="������ ������" /></p></td>
                        <td></td>
                    </tr>         
  </table>

</form>

<?php 
 $res = mysql_query("SELECT COUNT(*) FROM news");
 $row = mysql_fetch_row($res);
 $total = $row[0]; // ����� �������
 //echo $total;
?>


<?php 


//number of pages view
$page=2;
$n=5;
switch($n) {
case 2: echo "<a>1</a> <a>2</a>";
break; 
case 3: echo "<a>1</a> <a>2</a> <a>3</a>";
break;
case 4: 
	if ($page==1) echo "<a>1</a> <a>2</a> ... <a>4</a>";
	if ($page==4) echo "<a>1</a> ... <a>3</a> <a>4</a>";
	if ($page==2 or $page==3) echo "<a>1</a> <a>2</a> <a>3</a> <a>4</a>";
break;
case 5: 
	switch($page) {
	case 1: echo "<a>1</a> <a>2</a> ... <a>5</a>";
	break;
	case 2: echo "<a>1</a> <a>2</a> <a>3</a> ... <a>5</a>";
	break;
	case 3: echo "<a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a>";
	break;
	case 4: echo "<a>1</a> ... <a>3</a> <a>4</a> <a>5</a>";
	break;
	case 5: echo "<a>1</a> ... <a>4</a> <a>5</a>";
	break;
	}
break;
case 6: 
	switch($page) {
		case 1: echo "<a>1</a> <a>2</a> ... <a>6</a>";
		break;
		case 2: echo "<a>1</a> <a>2</a> <a>3</a> ... <a>6</a>";
		break;
		case 3: echo "<a>1</a> <a>2</a> <a>3</a> <a>4</a> ... <a>6</a>";
		break;
		case 4: echo "<a>1</a> ... <a>3</a> <a>4</a> <a>5</a> <a>6</a>";
		break;
		case 5: echo "<a>1</a> ... <a>4</a> <a>5</a> <a>6</a>";
		break;
		case 6: echo "<a>1</a> ... <a>5</a> <a>6</a>";
		break;
	}
break;
case $n>6:
	 switch($page) {
		case 1: echo "<a>1</a> <a>2</a> ... <a>$n</a>";
		break;
		case 2: echo "<a>1</a> <a>2</a> <a>3</a> ... <a>$n</a>";
		break;
		case 3: echo "<a>1</a> <a>2</a> <a>3</a> <a>4</a> ... <a>$n</a>";
		break;
		case ($page>3 and $page<($n-2)): echo "<a>1</a> ... <a>".($page-1)."</a> <a>".$page."</a> <a>".($page+1)."</a> ... <a>$n</a>";
		break;
		case ($n-2): echo "<a>1</a> ... <a>".($n-3)."</a> <a>".($n-2)."</a> <a>".($n-1)."</a> <a>".$n."</a>";
		break;
		case ($n-1): echo "<a>1</a> ... <a>".($page-1)."</a> <a>".$page."</a> <a>".($page+1)."</a>";
		break;
		case $n: echo "<a>1</a> ... <a>".($page-1)."</a> <a>".$page."</a>";
		break;
	  }
break;
}



?>

<h2 align="center">������������ ������</h2>
<div align="justify"><br>
</div>
<p align="justify">��� ���� ��������� �������� ������ �� ����, ������ �������������. ���� �� ��� ������������ (��� ����� �� ��������������) ������ �������� ���� �������������� ��� ���� �� ������. ϳ��� ����, �� �������� ���� ��������� �� ��������� ������� ������, ��� �������� ���� ������, ��� ������ �������� �� �������� ������� �����. ��� ������ ����, ��������� �� ���� ������� �����, ���� ��� ������ ���������������.</p>

<?php 
									if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua")  
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en")
									if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru")
?>
</body>
</html>