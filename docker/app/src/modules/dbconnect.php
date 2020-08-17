<?php
  try {
    $dsn = 'mysql:host=db;dbname=taskApp';
    $db = new PDO($dsn, 'admin', 'admin');
  } catch (PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
    exit;
  }
?>