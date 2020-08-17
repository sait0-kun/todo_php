<?php
  session_start();
?>

<header class="header">
  <?php if (isset($_SESSION['name'])): ?>
    <a href="main.php">todoリスト</a>
  <?php else: ?>
    <a href="index.php">todoリスト</a>
  <?php endif; ?>
</header>