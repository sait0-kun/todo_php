<?php
    session_start();
    require('./modules/dbconnect.php');

    if (!empty($_POST)) {
        // ログイン失敗時のユーザー名formに表示するため
        $user_name = $_POST['user_name'];

        // 両方のformに入力された場合
        if ($_POST['user_name'] !== '' && $_POST['user_pass'] !== '') {
            $login = $db->prepare('SELECT * FROM users WHERE user_name=? AND password=?');
            $login->execute(array(
                $_POST['user_name'],
                // $_POST['user_pass'],
                sha1($_POST['user_pass'])
            ));
            // ユーザー登録済みならDBから取得
            $member = $login->fetch();

            if ($member) {
                // ログイン時にセッションに保存
                $_SESSION['id'] = $member['user_id'];
                $_SESSION['name'] = $member['user_name'];
                $_SESSION['time'] = time();

                header('Location: main.php');
                exit();
            } else {
                // ユーザー名、パスワードのどちらかを間違えた場合
                $error['login'] = 'failed';
            }
        } else {
            // formのどちらか一方が未入力の場合
            $error['login'] = 'blank';
        }
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
    <h1 class="common__title">todoリストにログイン</h1>
    <form class="login" action="" method="post">
        <input class="login__form"  type="text" name="user_name" size="30" maxlength="20" placeholder="ユーザー名" value="<?php echo htmlspecialchars($user_name); ?>">
        <!-- ログイン失敗時 -->
        <?php if ($error['login'] === 'blank'): ?>
        <p>*ユーザー名とパスワードをご記入ください。</p>
        <?php endif; ?>
        <!--  -->
        <input class="login__form"  type="password" name="user_pass" size="30" maxlength="20" placeholder="パスワード">
        <!-- ログイン失敗時 -->
        <?php if ($error['login'] === 'failed'): ?>
        <p>*ログインに失敗しました。正しくご記入ください。</p>
        <?php endif; ?>
        <!--  -->
        <div class="common__btn">
            <a class="common__btn__left" href="./create_user.php">ユーザー登録</a>
            <input class="common__btn__right" type="submit" value="ログイン">
        </div>
    </form>
</section>
<?php include('./components/footer.php') ?>


</body>
</html>