<?php
$nums = array((int)$_POST['num1'], (int)$_POST['num2'], (int)$_POST['num3']);
$max = max($nums);
$min = min($nums);
$ave = array_sum($nums);
$ave = round($ave / 3);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題05-01</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-4">
        <div class="card">
          <div class="card-header">結果</div>
          <div class="card-body">

            <table class="table table-bordered">
              <tr>
                <th>最大値</th>
                <th>最小値</th>
                <th>平均値</th>
              </tr>
              <tr>
                <td><?= $max ?></td>
                <td><?= $min ?></td>
                <td><?= $ave ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
