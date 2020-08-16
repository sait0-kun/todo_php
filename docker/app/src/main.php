<?php
    session_start();
    require('dbconnect.php');

    // ログインorユーザー登録してなかったらログイン画面に戻す処理
    if (!isset($_SESSION['id'])) {
		header('Location: index.php');
		exit();
    }

    // user_idに基づいてtaskを取得
    $statement = $db->prepare('SELECT task_name, priority FROM task WHERE user_id ="'. $_SESSION['id'] .'"');
    $statement->execute();
    $task = $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>my-todo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header class="header">todoリスト</header>
<section class="main">
    <h1 class="main__title">todo一覧</h1>
    <ul class="main__list">
        <?php foreach ($task as $value): ?>
            <li class="main__list__task"><pre class="main__list__task-text"><?php print(htmlspecialchars($value['task_name'], ENT_QUOTES)); ?></pre><a class="main__list__task-edit" href="update.php">編集</a></li>
        <?php endforeach; ?>
    </ul>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>