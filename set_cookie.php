<?php
if ($_GET['lang']=='en') SetCookie("lan","en",mktime(0,0,0,01,25,2025));
if ($_GET['lang']=='ua') SetCookie("lan","ua",mktime(0,0,0,01,25,2025));
if ($_GET['lang']=='ru') SetCookie("lan","ru",mktime(0,0,0,01,25,2025));
header("location: " . $_SERVER["HTTP_REFERER"]);
 ?>