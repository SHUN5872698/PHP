<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();


//セッションに保存されたエラーメッセージとform内容を代入する変数の宣言
$msg = '';
$date = '';

//例外が発生した場合セッションの内容を変数に代入する
if (isset($_SESSION['error'])) {
  $msg = $_SESSION['error']['msg'];
  $date = $_SESSION['error']['date'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題09-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-4">
        <div class="card">
          <div class="card-header">日付かを判定</div>
          <div class="card-body">
            <?php if (isset($_SESSION['error'])) : ?>
              <div class="alert alert-danger" role="alert">
                <?= $msg ?>
              </div>
            <?php endif ?>
            <form action="./action.php" method="post">
              <label>日付を入力してください
                <br>
                <font color="red">「/」で区切ってください</font>
              </label>
              <input type="text" class="form-control" name="date" value="<?= $date ?>">
              <input type="submit" value="送信" class="btn btn-primary mt-2">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
