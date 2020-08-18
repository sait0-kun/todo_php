<?php
  // ログインorユーザー登録してなかったらログイン画面に戻す処理
  if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
  }
?>