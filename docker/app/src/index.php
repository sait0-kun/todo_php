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
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>todo管理アプリケーション</header>
<section>
    <h1>todoリストにログイン</h1>
    <form action="" method="post">
        <input type="text" name="user_name" size="30" maxlength="20">
        <p>* ユーザーネームをご記入ください</p>
        <input type="text" name="user_pass" size="30" maxlength="20">
        <p>* パスワードをご記入ください</p>
        <div>
            <a href="signUp.php">ユーザ登録</a>
            <input type="submit" value="ログイン">
        </div>
    </form>
</section>


</body>
</html>