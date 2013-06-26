<?php 
setcookie("logged","");
setcookie("login","");
header("Location: ".$_SERVER['HTTP_REFERER']);
?>