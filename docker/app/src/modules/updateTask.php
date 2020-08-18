<?php
  // 編集処理
  if (!empty($_POST['add'])) {
    $statement = $db->prepare('UPDATE task SET task_name = "'. $_POST['add'] . '" WHERE task_id = "'. $_GET['id'] .'"');
    $statement->execute();
    header('Location: main.php');
    exit();
  }
?>