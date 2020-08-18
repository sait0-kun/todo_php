<?php
  // ページネーションの処理
  $page = $_REQUEST['page'];
  if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
      $page = $_REQUEST['page'];
  } else {
      $page = 1;
  }
  $start = ($page - 1) * 5;
  // user_idに基づいてtaskを取得
  $statement = $db->prepare('SELECT task_id, task_name FROM task WHERE user_id ="'. $_SESSION['id'] .'" ORDER BY task_id LIMIT ?, 5');
  $statement->bindParam(1, $start, PDO::PARAM_INT);
  $statement->execute();
  $task = $statement->fetchAll();
  // ページネーションの最後のページを取得
  $counts = $db->query('SELECT COUNT(*) as cnt FROM task WHERE user_id ="'. $_SESSION['id'] .'"');
  $count = $counts->fetch();
  $max_page = ceil($count['cnt'] / 5);
?>