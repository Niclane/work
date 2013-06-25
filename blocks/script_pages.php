<?php
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo '<a href="index.php">Головна сторінка</a><br><br>
	  <a href="use_site.php">Користування сайтом</a><br><br>
	  <a href="about_us.php">Про нас</a><br><br>';
if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo '<a href="index.php">Main page</a><br><br>
	  <a href="use_site.php">Using this site</a><br><br>
	  <a href="about_us.php">About us</a><br><br>';
if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo '<a href="index.php">Главная страница</a><br><br>
	  <a href="use_site.php">Пользование сайтом</a><br><br>
	  <a href="about_us.php">О нас</a><br><br>';
?>