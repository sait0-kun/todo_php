<?php
  // タスク名の取得処理
  if (isset($_GET['id'])) {
    $statement = $db->prepare('SELECT task_id, task_name FROM task WHERE task_id    ="'. $_GET['id'] .'" AND user_id = "'. $_SESSION['id'] .'"');
    $statement->execute();
    $task = $statement->fetch();
    // 別ユーザのタスクにアクセスしたらmain.phpに戻す
    if (empty($task)) {
        header('Location: main.php');
    }
  } else {
    header('Location: main.php');
  }
?>