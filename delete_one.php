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
  header("Location: ".$_SERVER['HTTP_REFERER']);
?>
