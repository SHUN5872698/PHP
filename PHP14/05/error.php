<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

// エラーがなかったらトップページにリダイレクトする
if (!isset($_SESSION['msg']['err'])) {
  header('Location: ./');
  exit;
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題14-05</title>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-4">
        <div class="card">
          <div class="card-header">
            エラーが発生しました
          </div>
          <div class="card-body">
            <div class="alert alert-danger" role="alert">
              <p><?= $_SESSION['msg']['err'] ?></p>
            </div>
            <a href="./logout.php" class="btn btn-danger">もどる</a>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
<?php
// エラーを削除する
unset($_SESSION['msg']['err']);
