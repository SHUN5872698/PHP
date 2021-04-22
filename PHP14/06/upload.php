<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// ログインしていないときは、login.phpへリダイレクト
if (empty($_SESSION['user'])) {
  header('Location: ./login.php');
  exit;
}
// データベース接続と安全対策のためのファイルを読み込む
require_once('./class/config/Config.php');
require_once('./class/util/SaftyUtil.php');
?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題14-06</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            CSVファイルのアップロード
          </div>
          <div class="card-body">
            <?php if (isset($_SESSION['err']['msg'])) : ?>
              <div class="alert alert-danger" role="alert">
                CSVファイルのアップロードに失敗しました。
              </div>
            <?php endif ?>
            <form method="post" action="./update.php" enctype="multipart/form-data">
              <input type="hidden" name="token" value="<?= SaftyUtil::generateToken() ?>">
              <div class="form-group">
                <label for="csv_file">CSVファイルを選択してください</label>
                <input type="file" name="csv_file" id="csv_file" class="form-control-file">
              </div>
              <input type="submit" value="送信" class="btn btn-primary">
            </form>
          </div>
          <div class="card-footer">
            <a href="./">もどる</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
