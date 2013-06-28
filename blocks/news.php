<?php 
$for_limit=$page*3-3;
$user_inf=mysql_query("SELECT id,title_new,date,author,user_img,text_new FROM news ORDER BY id DESC LIMIT $for_limit,3",$db);
while($inf_arr=mysql_fetch_array($user_inf)) {
	$logId=$inf_arr['author'];
	$logd=mysql_query("SELECT surname,name,lastname,mob,mail,login FROM users WHERE id='$logId'",$db);
	$log=mysql_fetch_array($logd);
	$inf_arr['author']=$log['surname']." ".$log['name']." ".$log['lastname']." ".$log['login'];
	$inf_arr['mob']=$log['mob'];
	$inf_arr['mail']=$log['mail'];
	
	
	// Making image
	if ($inf_arr['user_img']!="") {
		$size=getimagesize($inf_arr['user_img']);
		if ($size[0]>450 || $size[1]>450)
		$img="<img height='400' width='500' align='center' src=".$inf_arr['user_img'].">";
		else $img="<img align='center' src=".$inf_arr['user_img'].">";
	}
	else $img="";
	
	
	// Finding if text have 150 chars
	$text=$inf_arr['text_new'];
	if (iconv_strlen($text, "UTF-8")>150) {
		$text=mb_substr($text, 0, 150, "UTF-8")."...";
	}
	
	if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") printf('<table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<h2 class="news_name" align="center">%s</h2>
    <p class="news_adds"><strong>Дата створення новини:</strong> %s</p>
    <p class="news_adds"><strong>Автор:</strong> %s</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	<!--$img--><div align="center">%s</div>
	  <p>%s</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Телефон: %s
	</td>
    <td class="news_title">E-mail: %s</td>
</tr>
<tr align="right">
	<td class="news_title" colspan="2">
	  <a href="big_new.php?id=%s">Читати повністю</a>
	</td>
</tr>
</table>',$inf_arr['title_new'],$inf_arr['date'],$inf_arr['author'],$img,$text,$inf_arr['mob'],$inf_arr['mail'],$inf_arr['id']);

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") printf('<table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<h2 class="news_name" align="center">%s</h2>
    <p class="news_adds"><strong>Created:</strong> %s</p>
    <p class="news_adds"><strong>Author:</strong> %s</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	<!--$img--><div align="center">%s</div>
	  <p>%s</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Mobile: %s
	</td>
    <td class="news_title">E-mail: %s</td>
</tr>
<tr align="right">
	<td class="news_title" colspan="2">
	  <a href="big_new.php?id=%s">Read more</a>
	</td>
</tr>
</table>',$inf_arr['title_new'],$inf_arr['date'],$inf_arr['author'],$img,$text,$inf_arr['mob'],$inf_arr['mail'],$inf_arr['id']);

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") printf('<table align="center" class="news" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" class="news_title">
	<h2 class="news_name" align="center">%s</h2>
    <p class="news_adds"><strong>Дата создания новости:</strong> %s</p>
    <p class="news_adds"><strong>Автор:</strong> %s</p>
	</td>
</tr>
<tr>
	<td colspan="2">
	<!--$img--><div align="center">%s</div>
	  <p>%s</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Телефон: %s
	</td>
    <td class="news_title">E-mail: %s</td>
</tr>
<tr align="right">
	<td class="news_title" colspan="2">
	  <a href="big_new.php?id=%s">Читать полностью</a>
	</td>
</tr>
</table>',$inf_arr['title_new'],$inf_arr['date'],$inf_arr['author'],$img,$text,$inf_arr['mob'],$inf_arr['mail'],$inf_arr['id']);
}	  
?>