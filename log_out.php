<?php 
setcookie("logged","");
header("Location: ".$_SERVER['HTTP_REFERER']);
?>