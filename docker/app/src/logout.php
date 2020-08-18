<?php
    session_start();
    require('./modules/dbconnect.php');
    require('./modules/checkLogin.php');
    require('./modules/userLogout.php');
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
<section class="main">
    <p>Hello!!  <?php print(htmlspecialchars($_SESSION['name'])); ?>さん</p>
    <h1 class="main__title">ログアウトしますか？</h1>
    <form action="" method="post">
        <input type="hidden" name="user_id" value="<?php print(htmlspecialchars($_SESSION['id'])); ?>">
        <input type="submit" value="ログアウト">
    </form>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>