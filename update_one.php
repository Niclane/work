<?php
  if (!isset($_POST['id'])) exit();
  $id=$_POST['id'];
  $title_new=$_POST['title_new'];
  $text_new=$_POST['text_new'];
  require_once "blocks/bd.php";
  mysql_query("UPDATE news SET title_new='$title_new', text_new='$text_new' WHERE id='$id'",$db);
  header("Location: change_news.php");
?>
