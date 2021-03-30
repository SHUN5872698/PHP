<?php
//Carbonを使用するためautoload.phpの読み込み
//絶対パスで取得
require_once('/Applications/MAMP/vendor/autoload.php');
//相対パスで取得
// require_once('../../../../vendor/autoload.php');

use Carbon\Carbon;

//世界標準時間を取得
$universal = Carbon::now()->Format('Y年m月d日H時i分s秒');

//日本標準時間を取得
$asia = Carbon::now('Asia/Tokyo')->Format('Y年m月d日H時i分s秒');
// echo $asia;

//日本語にローカライズ
Carbon::setLocale('ja');
//今日の曜日を取得
$week = Carbon::now()->isoformat('ddd曜日');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題07-05</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card">
          <div class="card-header">現在時間と曜日</div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>今日の曜日</th>
                <td><?= $week ?></td>
              </tr>
              <tr>
                <th>日本標準時間</th>
                <td><?= $asia ?></td>
              </tr>
              <tr>
                <th>世界標準時間</th>
                <td><?= $universal ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
