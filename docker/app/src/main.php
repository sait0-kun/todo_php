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
<section class="main">
    <h1 class="main__title">todo一覧</h1>
    <ul class="main__list">
        <li class="main__list__task"><pre class="main__list__task-text">aaa</pre><a class="main__list__task-edit" href="#">編集</a></li>
        <li class="main__list__task"><pre class="main__list__task-text">aaa</pre><a class="main__list__task-edit" href="#">編集</a></li>
        <li class="main__list__task"><pre class="main__list__task-text">aaa</pre><a class="main__list__task-edit" href="#">編集</a></li>
    </ul>
</section>
<footer class="footer">©︎ 2020 saito</footer>


</body>
</html>