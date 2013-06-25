<?php 
$for_limit=$page*3-3;
$user_inf=mysql_query("SELECT title_new,date,author,text_new,mob,mail FROM news ORDER BY id DESC LIMIT $for_limit,3",$db);
while($inf_arr=mysql_fetch_array($user_inf)) {
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
	  <p>%s</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Телефон: %s
	</td>
    <td class="news_title">E-mail: %s</td>
</tr>
</table>',$inf_arr['title_new'],$inf_arr['date'],$inf_arr['author'],$inf_arr['text_new'],$inf_arr['mob'],$inf_arr['mail']);

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
	  <p>%s</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Mobile: %s
	</td>
    <td class="news_title">E-mail: %s</td>
</tr>
</table>',$inf_arr['title_new'],$inf_arr['date'],$inf_arr['author'],$inf_arr['text_new'],$inf_arr['mob'],$inf_arr['mail']);

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
	  <p>%s</p>
	</td>
</tr>
<tr>
	<td class="news_title">
	  Телефон: %s
	</td>
    <td class="news_title">E-mail: %s</td>
</tr>
</table>',$inf_arr['title_new'],$inf_arr['date'],$inf_arr['author'],$inf_arr['text_new'],$inf_arr['mob'],$inf_arr['mail']);
}	  
?>