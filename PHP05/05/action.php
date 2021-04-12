<?php
$num = $_POST['num'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題05-05</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card">
          <div class="card-header">判定結果</div>
          <div class="card-body">
            <?php if (is_numeric($num)) { ?>
              <p>入力されたのは数値です。</p>
            <?php } else if (empty($num)) { ?>
              <p>何か入力してください...</p>
            <?php } else { ?>
              <p>入力されたのは数値ではありません</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
