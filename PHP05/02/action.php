<?php
$decimal = $_POST['decimal'];
$round = round($decimal);
$ceil = ceil($decimal);
$floor = floor($decimal);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題05-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <th>四捨五入</th>
                <th>切り上げ</th>
                <th>切り捨て</th>
              </tr>
              <tr>
                <td><?= $round ?></td>
                <td><?= $ceil ?></td>
                <td><?= $floor ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
