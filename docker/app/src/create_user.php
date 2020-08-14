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
<section class="create">
    <h1 class="create__title">新規ユーザー登録</h1>
    <form class="create__form" action="" method="post">
        <input class="create__form__input"  type="text" name="user_name" size="30" maxlength="20" placeholder="ユーザー名">
        <input class="create__form__input"  type="text" name="user_pass" size="30" maxlength="20" placeholder="パスワード">
        <input class="create__form__input"  type="text" name="user_pass" size="30" maxlength="20" placeholder="パスワードを再度入力して下さい">
        <div class="create__form__btn">
            <input class="create__form__btn-register" type="submit" value="ユーザー登録">
        </div>
    </form>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>