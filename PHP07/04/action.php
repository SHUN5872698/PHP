<?php
//Menu.phpとNoodle.phpとDrink.phpの読み込み
require_once('./Menu.php');
require_once('./Noodle.php');
require_once('./Drink.php');

//クラスのインスタンスを作成
$ramen_menus = new Noodle($_POST['カテゴリー'][0], $_POST['メニュー'][0], $_POST['固さ'], $_POST['値段'][0]);
$drink_menus = new Drink($_POST['カテゴリー'][1], $_POST['メニュー'][1], $_POST['ジョッキの大きさ'], $_POST['値段'][1]);
//インスタンスから連想配列を作成
$ramen_menus = $ramen_menus->getData();
$drink_menus = $drink_menus->getData();

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題07-04</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-6 ">
        <div class="card">
          <div class="card-header">ラーメンのオーダー</div>
          <div class="card-body">
            <table class="table table-bordered">
              <?php foreach ($ramen_menus as $key => $ramen) { ?>
                <tr>
                  <td><?= $key ?></td>
                  <td><?= $ramen ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <div class="col-6 ">
        <div class="card">
          <div class="card-header">ドリンクの確認</div>
          <div class="card-body">
            <table class="table table-bordered">
              <?php foreach ($drink_menus as $key => $drink) { ?>
                <tr>
                  <td><?= $key ?></td>
                  <td><?= $drink ?></td>
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
