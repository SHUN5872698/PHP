<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// データベース接続と安全対策のためのファイルを読み込む
require_once('./class/config/Config.php');
require_once('./class/util/SaftyUtil.php');
?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題14-04</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">新規ユーザー登録</div>
          <div class="card-body">

            <?php if (isset($_SESSION['err_msg'])) : ?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION['err_msg'] ?>
              </div>
            <?php endif ?>

            <form action="./user_add_action.php" method="post">
              <input type="hidden" name="token" value="<?= SaftyUtil::generateToken() ?>">
              <div class="form-group mb-3 mr-1">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" class="form-control">
              </div>

              <div class="form-group mb-3 mr-1">
                <label for="password">パスワード</label>
                <input type="text" name="password" id="password" class="form-control">
              </div>

              <div class="form-group mb-3 mr-1">
                <label for="name">お名前</label>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              <input type="submit" value="登録" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
