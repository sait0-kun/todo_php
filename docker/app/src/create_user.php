<?php
    session_start();
    require('./modules/dbconnect.php');

    if (!empty($_POST)) {
        // ユーザー名が空白の場合
        if ($_POST['user_name'] === '') {
            $error['user_name'] = 'blank';
        }
        // パスワードが3文字以下の場合
        if (strlen($_POST['user_pass']) < 4) {
            $error['user_pass'] = 'length';
        }
        // パスワードが空欄の場合
        if ($_POST['user_pass'] === '') {
            $error['user_pass'] = 'blank';
        }
        // パスワードの入力が2回目で間違っていた場合
        if ($_POST['user_pass'] !== $_POST['user_pass_re-enter']) {
            $error['user_pass_re-enter'] = 'difference';
        }
    }

    if (empty($error)) {
        // ユーザー名が既に使用されている場合の処理
        $member = $db->prepare('SELECT COUNT(*) AS cnt FROM users WHERE user_name=?');
        $member->execute(array($_POST['user_name']));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['user_name'] = 'duplicate';
        } else {
            // 問題なければセッションに設定
            $_SESSION['create'] = $_POST;
        }
    }

    if(!empty($_SESSION['create'])) {
        // ユーザー登録処理
        $statement = $db->prepare('INSERT INTO users SET user_name=?, password=?');
        $statement->execute(array(
            $_SESSION['create']['user_name'],
            sha1($_SESSION['create']['user_pass'])
        ));

        // ユーザー登録後、DBからuser_id取得してセッションに保存
        $login = $db->prepare('SELECT * FROM users WHERE user_name=? AND password=?');
        $login->execute(array(
            $_SESSION['create']['user_name'],
            sha1($_SESSION['create']['user_pass'])
        ));
        $member = $login->fetch();

        $_SESSION['id'] = $member['user_id'];
        $_SESSION['name'] = $member['user_name'];
        $_SESSION['time'] = time();

        unset($_SESSION['create']);

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
<section class="create">
    <h1 class="create__title">新規ユーザー登録</h1>
    <form class="create__form" action="" method="post">
        <input class="create__form__input"  type="text" name="user_name" size="30" maxlength="20" placeholder="ユーザー名" value="<?php print(htmlspecialchars($_POST['user_name'], ENT_QUOTES)); ?>">
        <?php if ($error['user_name'] === 'blank'): ?>
        <p>*ユーザー名を入力して下さい。</p>
        <?php endif; ?>
        <?php if ($error['user_name'] === 'duplicate'): ?>
        <p>*指定されたユーザー名は既に使用されています。</p>
        <?php endif; ?>
        <input class="create__form__input"  type="password" name="user_pass" size="30" maxlength="20" placeholder="パスワード">
        <?php if ($error['user_pass'] === 'length'): ?>
        <p>*パスワードは4文字以上を入力して下さい。</p>
        <?php endif; ?>
        <?php if ($error['user_pass'] === 'blank'): ?>
        <p>*パスワードを入力して下さい。</p>
        <?php endif; ?>
        <input class="create__form__input"  type="password" name="user_pass_re-enter" size="30" maxlength="20" placeholder="パスワードを再度入力して下さい">
        <?php if ($error['user_pass_re-enter'] === 'difference'): ?>
        <p>*再入力のパスワードが違います。</p>
        <?php endif; ?>
        <div class="create__form__btn">
            <input class="create__form__btn-register" type="submit" value="ユーザー登録">
        </div>
    </form>
</section>
<?php include('./components/footer.php') ?>


</body>
</html>