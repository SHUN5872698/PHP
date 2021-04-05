<?php
// POSTされてきたテキストデータを変数に代入
$text = $_POST['text_file'];

// ファイルを書き込みモードで開く。
$fp = fopen('./path/sample.txt', 'w');

// データをテキストファイルに書き込む
if (fwrite($fp, $text)) {
  $msg = '書き込みが完了しました。';
} else {
  $msg = null;
}

// ディレクトリー内のsample.txtを読み込む
$path = './path/sample.txt';
$fp = fopen($path, 'r');
?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題11-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <?php if (isset($msg)) { ?>
              <p><?= $msg ?><br>内容</p>
              <?php
              while (($buf = fgets($fp)) !== false) {
                echo '<p>' . $buf . '</p>';
              }
              ?>
            <?php } else { ?>
              <p>書き込みに失敗しました。</p>
            <?php } ?>
            <a href="./">もどる</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
</body>

</html>
