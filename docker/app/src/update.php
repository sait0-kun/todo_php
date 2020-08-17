<?php
    session_start();
    require('./modules/dbconnect.php');

    // ログインorユーザー登録してなかったらログイン画面に戻す処理
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }

    // タスク名の取得処理
    if (isset($_GET['id'])) {
        $statement = $db->prepare('SELECT task_name FROM task WHERE task_id ="'. $_GET['id'] .'" AND user_id = "'. $_SESSION['id'] .'"');
        $statement->execute();
        $task = $statement->fetch();

        // 別ユーザのタスクにアクセスしたらmain.phpに戻す
        if (empty($task)) {
            header('Location: main.php');
        }
    } else {
        header('Location: main.php');
    }

    // 編集処理
    if (!empty($_POST['add'])) {
        $statement = $db->prepare('UPDATE task SET task_name = "'. $_POST['add'] . '" WHERE task_id = "'. $_GET['id'] .'"');
        $statement->execute();

        header('Location: main.php');
        exit();
    }
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
    <h1 class="update__title">タスク編集</h1>
    <form class="update__form" action="" method="post">
        <input
        class="update__form__input"
        type="text" name="add" size="30" maxlength="40"
        value="<?php print(htmlspecialchars($task['task_name'], ENT_QUOTES)); ?>"
        >
        <div class="update__form__btn">
            <input class="update__form__btn-register" type="submit" value="登録">
        </div>
    </form>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>