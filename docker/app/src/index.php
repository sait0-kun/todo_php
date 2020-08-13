<?php
    session_start();
    require('dbconnect.php');
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
<section class="login">
    <h1 class="login__title">todoリストにログイン</h1>
    <form class="login__form" action="" method="post">
        <input class="login__form__input"  type="text" name="user_name" size="30" maxlength="20" placeholder="ユーザー名">
        <input class="login__form__input"  type="text" name="user_pass" size="30" maxlength="20" placeholder="パスワード">
        <div class="login__form__btn">
            <a class="login__form__btn-left" href="signUp.php">ユーザー登録</a>
            <input class="login__form__btn-right" type="submit" value="ログイン">
        </div>
    </form>
</section>


</body>
</html>