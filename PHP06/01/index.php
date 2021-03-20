<?php
session_start();
session_regenerate_id();
$text = "";
if (isset($_SESSION['text'])) {
  $text = $_SESSION['text'];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題06-01</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-4">
        <div class="card">
          <div class="card-header">セッションの練習問題</div>
          <div class="card-body">
            <form action="./action.php" method="post">
              <p>何か入力してください。</p>
              <input type="text" class="form-control" name="text" value="<?= $text ?>">
              <input type="submit" value="送信" class="btn btn-primary mt-2">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
