<?php
  // ログアウト処理
  if (isset($_POST['user_id'])) {
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['time']);
    header('Location: index.php');
  }
?>