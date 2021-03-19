<?php
$products = [
  0 => [
    'product_name' => 'みかん',
    'production_are' => '愛媛県',
    'quality' => '優',
    'price' => '3000',
  ],
  1 => [
    'product_name' => 'りんご',
    'production_are' => '⻘森県',
    'quality' => '優',
    'price' => ' 5000',
  ],
  2 => [
    'product_name' => 'バナナ',
    'production_are' => 'フィリピン',
    'quality' => '優',
    'price' => '1500
',
  ]
];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題04-08</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-5">
        <div class="card">
          <div class="card-header">商品の情報</div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>品名</th>
                <th>産地</th>
                <th>品質</th>
                <th>価格（円）</th>
              </tr>
              <?php foreach ($products as $product) { ?>
                <tr>
                  <?php foreach ($product as $value) { ?>
                    <td><?= $value ?></td>
                  <?php } ?>
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
