<?php
$products = [
  0 => [
    'product_name' => 'みかん',
    'production_are' => '愛媛県',
    'quality' => '優',
    'price' => '3000',
    'count' => '5',
  ],
  1 => [
    'product_name' => 'りんご',
    'production_are' => '⻘森県',
    'quality' => '優',
    'price' => ' 5000',
    'count' => '2',

  ],
  2 => [
    'product_name' => 'バナナ',
    'production_are' => 'フィリピン',
    'quality' => '優',
    'price' => '1500',
    'count' => '3',
  ]
];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題04-09</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-8">
        <div class="card">
          <div class="card-header">商品の情報(for)</div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>品名</th>
                <th>産地</th>
                <th>品質</th>
                <th>価格（円）</th>
                <th>数量</th>
                <th>小計（円）</th>
              </tr>
              <?php
              $count = count($products);
              ?>
              <?php for ($i = 0; $i < $count; $i++) { ?>
                <tr>
                  <td><?= $products[$i]['product_name'] ?></td>
                  <td><?= $products[$i]['production_are'] ?></td>
                  <td><?= $products[$i]['quality'] ?></td>
                  <td><?= $products[$i]['price'] ?></td>
                  <td><?= $products[$i]['count'] ?></td>
                  <td><?= $products[$i]['price'] * $products[$i]['count'] ?></td>
                </tr>
              <?php
                $sum +=  $products[$i]['price'] * $products[$i]['count'];
              }
              ?>
            </table>
            <?= '合計' . $sum . '円' ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
