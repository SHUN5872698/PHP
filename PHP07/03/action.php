<?php
//Menu.phpとNoodle.phpの読み込み
require_once('./Menu.php');
require_once('./Noodle.php');

//クラスのインスタンスを作成
$datas = new Noodle($_POST['カテゴリー'], $_POST['メニュー'], $_POST['値段'], $_POST['固さ']);
//インスタンスから連想配列を作成
$datas = $datas->getData();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題07-03</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-8">
        <div class="card">
          <div class="card-header">オーダー確認</div>
          <div class="card-body">
            <table class="table table-bordered">
              <?php foreach ($datas as $key => $data) { ?>
                <tr>
                  <td><?= $key ?></td>
                  <td><?= $data ?></td>
                </tr>
              <?php } ?>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
