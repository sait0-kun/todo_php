<?php
    session_start();
    require('./modules/dbconnect.php');
    require('./modules/checkLogin.php');
    require('./modules/getTask.php');
    require('./modules/deleteTask.php');
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
<section class="update">
    <h1 class="update__title">タスク削除</h1>
    <form class="update__form" action="" method="post">
        <input
        class="update__form__input"
        type="text" name="delete" size="30" maxlength="40" readonly
        value="<?php print(htmlspecialchars($task['task_name'], ENT_QUOTES)); ?>"
        >
        <div class="update__form__btn">
            <input class="update__form__btn-register" type="submit" value="削除">
        </div>
    </form>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>