<?php
//Carbonを使用するためautoload.phpの読み込み
require_once('/Applications/MAMP/vendor/autoload.php');
//ライブラリを使用
use Carbon\Carbon;

// 今日の日付のCarbonクラスのインスタンスを生成。
$now = Carbon::now('Asia/Tokyo');
//今月を0とする。
$month = 0;
//$_Getに数字か整数が送信されてきた場合$monthに代入
if (isset($_GET['month']) && is_numeric($_GET['month']) && is_int((int) $_GET['month'])) {
  $month = (int) $_GET['month'];
}

//当月の月初を取得
//$nowでは当月の最終日に変換されてしまうことがあるのでライブラリから当日を取得
$firstDay =  Carbon::now()->firstOfMonth()->addMonth($month);
//当月の月末を取得して整数にフォーマット
$lastDay = Carbon::now()->firstOfMonth()->addMonth($month)->daysInMonth;

// 当月の月初が何曜日かを数字に変換して取得
// 月曜日 = 1 火曜日 = 2水曜日 = 3 木曜日 = 4 金曜日 = 5 土曜日 = 6 日曜日 = 7
$beginDayOfWeek = $firstDay->format('w');

// 当月に何週あるかを取得
// 当月の日数と月初の数字を足して7で割り小数点以下を切り捨てる事で、同月の週数が求められる
$weeks = ceil(($lastDay + $beginDayOfWeek) / 7);

// カレンダに記述する日付のカウンターを代入
$date = 1;

//曜日の配列を作成
$weekdays = ['日', '月', '火', '水', '木', '金', '土'];

// //一ヶ月分の日数インスタンスを作成
// $days = new Weeks($month);
// //インスタンスから連想配列を作成
// $days = $days->getWeeks();
?>

<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>練習問題07-07</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
    th {
      text-align: center;
    }

    td {
      text-align: right;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-6">
        <div class="card">
          <div class="card-header"><?= $firstDay->isoFormat('Y年M月') ?></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <?php foreach ($weekdays as $week) { ?>
                    <th><?= $week ?></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <!-- 当月にある週数分繰り返し -->
                <?php for ($week = 0; $week < $weeks; $week++) { ?>
                  <tr>
                    <!-- 一週間の日数分（7日分）繰り返し -->
                    <?php for ($day = 0; $day < 7; $day++) { ?>
                      <td>
                        <?php
                        if ($week == 0 && $day >= $beginDayOfWeek) {
                          // 月の1週目で、かつ、月初の日（曜日）以上のときは、
                          // 日付のカウンタを表示して、1を足す
                          echo $date++;
                        } elseif ($week > 0 && $date <= $lastDay) {
                          // 月の2週目以降で、かつ、月末の日までのときは、
                          // 日付のカウンタを表示して、1を足す
                          echo $date++;
                        }
                        // その他の日は何も表示しない
                        ?>
                      </td>
                    <?php } ?>
                  </tr>
                <?php } ?>
            </table>
            <div class="navi">
              <div class="row justify-content-md-center">
                <p><a class="btn btn-light btn-sm ml-3" href="./?month=<?= $month - 1 ?>">前の月</a></p>
                <p><a class="btn btn-primary btn-sm mx-2" href="./">今月</a></p>
                <p><a class="btn btn-light btn-sm" href="./?month=<?= $month + 1 ?>">次の月</a></p>
              </div>
            </div>
          </div>
          </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>
