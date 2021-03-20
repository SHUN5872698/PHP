<?php
session_start();
session_regenerate_id();
if (isset($_SESSION['count']) && isset($_GET['reset'])) {
  unset($_SESSION['count']);
}

if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題06-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-4">
        <div class="card">
          <div class="card-header">セッションを使ったカウンタ</div>
          <div class="card-body">
            <p><?= $_SESSION['count'] ?>回目</p>
            <button id="count" class="btn btn-primary">カウント</button>
            <button id="reset" class="btn btn-outline-primary">リセット</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    $('#count').click(function() {
      location.href = './';
    });

    $('#reset').click(function() {
      location.href = './?reset';
    });
  </script>
</body>

</html>
