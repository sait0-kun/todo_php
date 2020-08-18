<?php
  // 削除処理
  if (!empty($_POST['delete'])) {
    $statement = $db->prepare('DELETE FROM task WHERE task_id = "' . $_GET['id']. '"');
    $statement->execute();

    header('Location: main.php');
    exit();
  }
?>