<?php
    session_start();
    require('./modules/dbconnect.php');

    // ログインorユーザー登録してなかったらログイン画面に戻す処理
    if (!isset($_SESSION['id'])) {
		header('Location: index.php');
		exit();
    }

    if (isset($_POST['user_id'])) {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['time']);

        header('Location: index.php');
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
<section class="common">
    <p>Hello!!  <?php print(htmlspecialchars($_SESSION['name'])); ?>さん</p>
    <h1 class="common__title">ログアウトしますか？</h1>
    <form class="common__btn" action="" method="post">
        <input type="hidden" name="user_id" value="<?php print(htmlspecialchars($_SESSION['id'])); ?>">
        <input class="common__btn-register" type="submit" value="ログアウト">
    </form>
</section>
<?php include('./components/footer.php') ?>

</body>
</html>