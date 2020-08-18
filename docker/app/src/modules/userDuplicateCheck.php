<?php
  if (empty($error)) {
    // ユーザー名が既に使用されている場合の処理
    $member = $db->prepare('SELECT COUNT(*) AS cnt FROM users WHERE user_name=?');
    $member->execute(array($_POST['user_name']));
    $record = $member->fetch();
    if ($record['cnt'] > 0) {
        $error['user_name'] = 'duplicate';
    } else {
        // 問題なければセッションに設定
        $_SESSION['create'] = $_POST;
    }
  }
?>