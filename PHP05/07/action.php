<?php
$text = mb_strlen($_POST['text']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題05-07</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card">
          <div class="card-header">判定結果</div>
          <div class="card-body">
            <?php if ($text >= 50) { ?>
              <p>入力された文字数は50文字以上です。</p>
            <?php } elseif ($text == 0) { ?>
              <p>何か入力してください。</p>
            <?php } else { ?>
              <p>入力された文字数は50文字以下です。</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
