<?php
  // タスク追加処理
  if (!empty($_POST['add'])) {
    $statement = $db->prepare('INSERT INTO task SET user_id=?, task_name=?');
    $statement->execute(array(
        $_SESSION['id'],
        $_POST['add']
    ));
    header('Location: main.php');
    exit();
  }
?>