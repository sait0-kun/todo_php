<?php
    session_start();
    require('./modules/dbconnect.php');
    require('./modules/checkLogin.php');
    require('./modules/getTask.php');
    require('./modules/updateTask.php');
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
<section class="common">
    <h1 class="common__title">タスク編集</h1>
    <form class="update" action="" method="post">
        <input
        class="update__form"
        type="text" name="add" size="30" maxlength="40"
        value="<?php print(htmlspecialchars($task['task_name'], ENT_QUOTES)); ?>"
        >
        <div class="common__btn">
            <input class="common__btn-register" type="submit" value="登録">
        </div>
    </form>
</section>
<?php include('./components/footer.php') ?>


</body>
</html>