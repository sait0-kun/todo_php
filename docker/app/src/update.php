<?php
    session_start();
    require('dbconnect.php');

    // ログインorユーザー登録してなかったらログイン画面に戻す処理
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }

    $statement = $db->prepare('SELECT task_name FROM task WHERE task_id ="'. $_GET['id'] .'"');
    $statement->execute();
    $task = $statement->fetch();
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
<section class="update">
    <h1 class="update__title">タスク編集</h1>
    <form class="update__form" action="" method="post">
        <input class="update__form__input"  type="text" name="add" size="30" maxlength="40" value="<?php print(htmlspecialchars($task['task_name'], ENT_QUOTES)); ?>">
        <div class="update__form__btn">
            <input class="update__form__btn-register" type="submit" value="登録">
        </div>
    </form>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>