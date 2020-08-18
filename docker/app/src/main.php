<?php
    session_start();
    require('./modules/dbconnect.php');
    require('./modules/checkLogin.php');
    require('./modules/pagenation.php');
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
<?php include('./components/header.php') ?>
<section class="main">
    <p>ようこそ<?php print(htmlspecialchars($_SESSION['name'])); ?>さん</p>
    <h1 class="main__title">todo一覧</h1>
    <ul class="main__list">
        <?php foreach ($task as $value): ?>
            <li class="main__list__task">
                <p class="main__list__task-text">
                <?php print(htmlspecialchars($value['task_name'], ENT_QUOTES)); ?>
                </p>
                <a
                class="main__list__task-edit"
                href="update.php?id=<?php print(htmlspecialchars($value['task_id'], ENT_QUOTES)); ?>">
                編集
                </a>
                <a
                class="main__list__task-edit"
                href="delete.php?id=<?php print(htmlspecialchars($value['task_id'], ENT_QUOTES)); ?>">
                削除
                </a>
            </li>
        <?php endforeach; ?>
        <li><a class="main__list__task-edit" href="add.php">タスク追加</a></li>

        <?php if ($page >= 2): ?>
        <a href="main.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
        <?php endif; ?>
        |
        <?php if ($page < $max_page): ?>
        <a href="main.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
        <?php endif; ?>
    </ul>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>