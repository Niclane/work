<?php
  if (!isset($_GET['id'])) exit();
  $id=$_GET['id'];
  require_once "blocks/bd.php";
  $res=mysql_query("SELECT user_img FROM news WHERE id='$id'",$db);
  $row=mysql_fetch_array($res);
  if ($row['user_img']!="") {
    unlink($row['user_img']);
  }
  mysql_query("DELETE FROM news WHERE id='$id'",$db);
  if ($_SERVER['HTTP_REFERER']=="http://".$_SERVER['HTTP_HOST']."/change_news.php") {
    header("Location: ".$_SERVER['HTTP_REFERER']);
  }
  else {
    header("Location: index.php");
  }
?>
