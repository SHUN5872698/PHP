<?php
// PHPファイルがあるサーバー上の絶対パスを取得
$path = __DIR__ . '/images/';

// アップロードされたファイル名でimagesフォルダに保存する
// 同じファイル名があるときはファイルを上書きする
move_uploaded_file($_FILES['image_file']['tmp_name'], $path . $_FILES['image_file']['name']);

// ディレクトリ内のファイルを配列で取得
$tmp = scandir($path);

// 配列でアップロードしたファイルの情報を取得
$files = [];
foreach ($tmp as $v) {
  // 「.」から始まるアイルを削除して、通常ファイルのみを取得する
  if (!preg_match('/^\./', $v) && is_file('./images/' . $v)) {
    $files[] = $v;
  }
}
?>


<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題10-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row my-3">
      <?php
      $cnt = 1;
      foreach ($files as $file) {
      ?>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <img src="./images/<?= $file ?>" class="img-fluid">
            </div>
          </div>
        </div>
        <?php
        if ($cnt % 4 == 0) {
        ?>
    </div>
    <div class="row my-3">
  <?php
        }
        $cnt++;
      }
  ?>
    </div>
    <a href="./">もどる</a>
  </div>
</body>

</html>
