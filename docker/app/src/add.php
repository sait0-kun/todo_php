<?php
    session_start();
    require('./modules/dbconnect.php');

    // ログインorユーザー登録してなかったらログイン画面に戻す処理
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }

    // タスク追加処理
    if (!empty($_POST['add'])) {
        $statement = $db->prepare('INSERT INTO task SET user_id=?, task_name=?');
        $statement->execute(array(
            $_SESSION['id'],
            $_POST['add']
        ));

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
<section class="add">
    <h1 class="add__title">タスク作成</h1>
    <form class="add__form" action="" method="post">
        <input class="add__form__input"  type="text" name="add" size="30" maxlength="40" placeholder="タスク名">
        <div class="add__form__btn">
            <input class="add__form__btn-register" type="submit" value="作成">
        </div>
    </form>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>