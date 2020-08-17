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
        $statement = $db->prepare('SELECT task_id, task_name FROM task WHERE task_id    ="'. $_GET['id'] .'" AND user_id = "'. $_SESSION['id'] .'"');
        $statement->execute();
        $task = $statement->fetch();

        // 別ユーザのタスクにアクセスしたらmain.phpに戻す
        if (empty($task)) {
            header('Location: main.php');
        }
    } else {
        header('Location: main.php');
    }

    if (!empty($_POST['delete'])) {
        $statement = $db->prepare('DELETE FROM task WHERE task_id = "' . $_GET['id']. '"');
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