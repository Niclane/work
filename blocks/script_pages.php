<?php
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo '<a href="index.php">������� �������</a><br><br>
	  <a href="use_site.php">������������ ������</a><br><br>
	  <a href="about_us.php">��� ���</a><br><br>';
if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo '<a href="index.php">Main page</a><br><br>
	  <a href="use_site.php">Using this site</a><br><br>
	  <a href="about_us.php">About us</a><br><br>';
if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo '<a href="index.php">������� ��������</a><br><br>
	  <a href="use_site.php">����������� ������</a><br><br>
	  <a href="about_us.php">� ���</a><br><br>';
?>