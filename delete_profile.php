<?php
  if (!isset($_COOKIE['login']) || $_COOKIE['login']=="") {
    header("Location: index.php");
  }
  require_once "blocks/bd.php";
  $hello=$_COOKIE['login'];
  $res=mysql_query("SELECT user_img FROM users WHERE login='$hello'",$db);
  $myrow=mysql_fetch_array($res);
  if ($myrow['user_img']!="") {
    $orig=explode("/",$myrow['user_img']);
    $arrOrig=end($orig);
    $arrOrig="original_avatars/".$arrOrig;
    unlink($myrow['user_img']);
    unlink($arrOrig);
  }
  mysql_query("DELETE FROM users WHERE login='$hello'",$db);
  setcookie("logged","");
  setcookie("login","");
  header("Location: index.php");
?>