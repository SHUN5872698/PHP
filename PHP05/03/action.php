<?php
$str = $_POST['str'];

$len = mb_strlen($str);
$first = mb_substr($str, 0, 1);
$last = mb_substr($str, $len - 1, 1);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題05-03</title>
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
                <th>文字数</th>
                <th>最初の文字</th>
                <th>最後の文字</th>
              </tr>
              <tr>
                <td><?= $len ?></td>
                <td><?= $first ?></td>
                <td><?= $last ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
