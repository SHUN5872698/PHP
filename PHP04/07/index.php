<?php
$orennzi_data = [
  'product_name' => 'みかん',
  'production_are' => '愛媛県',
  'quality' => '優',
  'price' => '3000',
];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題04-07</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-5">
        <div class="card">
          <div class="card-header">みかんの情報</div>
          <div class="card-body">
            <table class="table table-bordered">
              <?php foreach ($orennzi_data as $key => $orennzi) { ?>
                <tr>
                  <td><?= $key ?></td>
                  <td><?= $orennzi ?></td>
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
