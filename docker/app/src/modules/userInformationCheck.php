<?php
  if (!empty($_POST)) {
    // ユーザー名が空白の場合
    if ($_POST['user_name'] === '') {
        $error['user_name'] = 'blank';
    }
    // パスワードが3文字以下の場合
    if (strlen($_POST['user_pass']) < 4) {
        $error['user_pass'] = 'length';
    }
    // パスワードが空欄の場合
    if ($_POST['user_pass'] === '') {
        $error['user_pass'] = 'blank';
    }
    // パスワードの入力が2回目で間違っていた場合
    if ($_POST['user_pass'] !== $_POST['user_pass_re-enter']) {
        $error['user_pass_re-enter'] = 'difference';
    }
  }
?>