<?php
  if (!isset($_GET['id'])) exit();
  $id=$_GET['id'];
  require_once "blocks/bd.php";
  mysql_query("DELETE FROM news WHERE id='$id'",$db);
  header("Location: ".$_SERVER['HTTP_REFERER']);
?>
