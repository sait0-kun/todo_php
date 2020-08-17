<?php
  session_start();
?>

<header class="header">
  <?php if (isset($_SESSION['name'])): ?>
    <a class="headet__left" href="main.php">todoリスト</a>
    <a class="header__right" href="mypage.php">マイページへ</a>
  <?php else: ?>
    <a class="headet__left" href="index.php">todoリスト</a>
    <a class="header__right" href="index.php">ログイン</a>
  <?php endif; ?>
</header>